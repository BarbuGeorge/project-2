<?php if(!isset($args['ajax'])){
echo '<!DOCTYPE html><html lang="en"><head>';include('_meta.php'); echo '</head><body>'; get_header(); echo '<main class="page"><div>';
} ?>

<div id="questionaire" class="page-apply questionaire position-relative <?php echo isset($args['ajax']) ? 'ajax' : '';?>">
	<div class="d-flex align-items-center flex-row h-100">
		<transition name="left">
			<div class="container" :key="'step-'+step">
				<h5 class="m-0" v-if="!STEPS[step].hide_steps">Question {{step}} of 4</h5>

				<div class="pills mb-5" v-if="!STEPS[step].hide_steps">
					<a href="#" @click.prevent="go_step(1)"><span :class="{'filled': step>=1}" ></span></a>
					<a href="#" @click.prevent="go_step(2)"><span :class="{'filled': step>=2}" ></span></a>
					<a href="#" @click.prevent="go_step(3)"><span :class="{'filled': step>=3}" ></span></a>
					<a href="#" @click.prevent="go_step(4)"><span :class="{'filled': step>=4}" ></span></a>
				</div>

				<div v-if="step < 4">
					<div class="question-wrapper" v-cloak>
						<h1 class="m-0">{{STEPS[step]['question-'+step]}}</h1>
					</div>
					<div class="">
						<button type="button" class="btn outlined white me-3" @click="handle_answer('yes')">Yes</button>
						<button type="button" class="btn outlined white" @click="handle_answer('no')">No</button>
					</div>
				</div>
				<div v-else-if="step == 4" >
					<div class="row" >
						<div class="col-md-6">
							<h1>Enter basic contact information</h1>
						</div>
						<div class="col-md-6" v-cloak>
							<form @submit.prevent="save()">
								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="floatingInput1" required placeholder="First Name*"
									 v-model="STEPS[step]['first-name']" aria-label="FristName">
									 <label for="floatingInput1">First Name*</label>
								</div>

								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="floatingInput2" required placeholder="Last Name*" v-model="STEPS[step]['last-name']">
									<label for="floatingInput2">Last Name*</label>
								</div>

								<div class="form-floating mb-3">
									<input type="email" class="form-control" id="floatingInput3" required placeholder="Email" v-model="STEPS[step]['email']">
									<label for="floatingInput3">Email*</label>
								</div>

								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="floatingInput4" required placeholder="Phone" v-model="STEPS[step]['phone']">
									<label for="floatingInput4">Phone*</label>
								</div>

								<div class="form-floating mb-3">
									<input type="text" class="form-control" id="floatingInput5" required placeholder="Zip Code" v-model="STEPS[step]['zip']">
									<label for="floatingInput5">Zip Code*</label>
								</div>

								<div class="form-check mb-3 px-6 py-3" style="background-color: rgba(21, 28, 39, 0.35) !important">
									<input class="form-check-input" type="checkbox" value="" id="defaultCheck1" v-model="STEPS[step]['communication']" true-value="1" false-value="0">
									<label class="form-check-label" for="defaultCheck1" style="font-size: 12px; top: -2px; position: relative;">
										Would you like to receive communication from Morgan Van Lines via text message?
									</label>
								</div>

								<div class="form-group mt-5">
									<button class="btn outlined white" :disabled="STEPS[step]['submitting']" type="submit" v-if="!STEPS[step]['submitting']">Submit</button>
									<i class="fa-solid fa-spinner fa-spin" v-else></i>
								</div>
							</form>
						</div>
					</div>


				</div>
				<div v-else-if="step == 5" v-cloak>
					<i class="fa-solid fa-6x fa-circle-check"></i>
					<div class="my-4">
						<h1>You're a Qualified Candidate</h1>
						<p>Take the next step and complete your application for a driving position.</p>
					</div>
					<a :href="'https://intelliapp.driverapponline.com/c/morganvanlines?r=' + cp_referer" target="_blank" class="btn outlined white">Finish Application</a>
				</div>
				<div v-else-if="step == 6" v-cloak>
					<div class="mt-4 mb-8">
						<h1>At this time...</h1>
						<p class="mb-3">We are not accepting applicants who do not have a Class A CDL or are not already enrolled in a licensing program.</p>
						<p>Truck driving is an excellent career and we recommend applying to a commercial truck driving school like <a class="text-light text-decoration-underline" target="_blank" href="https://www.nemcc.edu/continuinged/commercial-truck-driving/index.html">Northeast Mississippi Community College</a></p>
					</div>
					<button type="button" class="btn outlined white" data-bs-dismiss="modal">Back to Homepage</button>

				</div>


			</div>
		</transition>
	</div>
</div>

<script>

</script>



<?php if(!isset($args['ajax'])){
echo '</div></main>'; get_footer(); echo '</body></html>';
} ?>
