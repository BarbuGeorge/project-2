// console.log('q is loaded')
if(typeof createApp == 'undefined'){
	const { createApp } = Vue
	createApp({
		data() {
		return {
			message: 'Hello Vue!',
			step: 1,

			STEPS: {
				1: {
					'question-1': 'Do you have a Class A CDL or are you currently in truck driving school?',
					'answer-1': null,
				},
				2: {
					'question-2': 'Have you had more than 6 months of CDL-A experience?',
					'answer-2': null,
				},
				3: {
					'question-3': 'Have you had any moving violations in the last 3 years?',
					'answer-4': null,
				},
				4: {
					'first-name': '',
					'last-name': '',
					'phone': '',
					'email': '',
					'zip': '',
					'communication': 0,
					'accept': 0,
					'submitting': false
				},
				5: {
					hide_steps: true,
				},
				6: {
					hide_steps: true,
				},
			},

			form_loading: false,
			cp_referer: 'ar-web-organic',


		}
		},
		mounted(){
			// console.log('mounted()');
			this.addHash();
		},
		methods:{
			go_step: function(what){
				this.step = what;
				this.addHash();
			},
			go_next: function(){
				this.go_step(parseInt(this.step)+1)
			},
			go_prev: function(){
				this.go_step(parseInt(this.step)-1)
			},

			handle_answer: function(what){
				this.STEPS[this.step]['answer-'+this.step] = what;
				if (this.step == 1 && what == 'no') {
					this.go_step(6);
				} else {
					this.go_next();
				}
			},

			save: function(){

				this.STEPS[this.step].submitting = true;

				let formData = new FormData();

				// add personal information from Step 4
				for (var i in this.STEPS[this.step]) {
					if (i == 'submitting') {
						continue;
					}
					formData.append(i, this.STEPS[this.step][i]);
				}

				// add answers from previous steps
				for (var i in this.STEPS) {
					for (var j in this.STEPS[i]) {
						if (j.substring(0, 7) == 'answer-') {
							formData.append(j, this.STEPS[i][j]);
						}
					}
				}

				// add CF7 form id
				formData.append('_wpcf7', IS_LIVE ? 156 : 156);

				fetch(wp_home_page + '/wp-json/contact-form-7/v1/contact-forms/156/feedback', {
					method: 'POST',
					cache: 'no-cache',
					body: formData
				}).then(async response => {
					let json = await response.json();

					console.log(json)

					if (json.status == 'mail_sent') {

						if (json.cp_referer) {
							this.cp_referer = json.cp_referer;
						}

						this.go_next();
					} else {
						// error see json.message
						alert(json.message);
					}
				}).finally(() => {
					this.STEPS[this.step].submitting = false;
				})

				console.log('SAVE', this.STEPS);
				// this.go_next();
			},

			addHash: function(){
				this.removeHash();
				window.location.href= "#popup-questionaire-"+this.step;
			},
			removeHash: function(){
				if ("pushState" in history){
					history.pushState("", document.title, window.location.pathname + window.location.search);		
				} else {
					window.location.href= "#";
				}
			}



		}
	}).mount('#questionaire');
}
