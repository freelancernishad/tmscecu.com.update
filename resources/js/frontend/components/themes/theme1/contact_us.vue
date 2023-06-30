<template>
    <div>
        <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>




              <div class="container bootdey">
                <h2 class="ms-2 mt-2">যোগাযোগ</h2>
                 <section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters mb-5">
							<div class="col-md-12">
								<div class="contact-wrap w-100 p-md-5 p-4">

									<div id="form-message-warning" class="mb-4"></div>

									<form method="POST" id="contactForm" name="contactForm" class="contactForm">

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Email Address</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Subject</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-map-marker"></span>
			        		</div>
			        		<div class="text">
				            <p><span>Address:</span> {{ schooldetails.SCHOLL_ADDRESS }}</p>
				          </div>
			          </div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-phone"></span>
			        		</div>
			        		<div class="text">
				            <p><span>Phone:</span> <a class="contactlink" :href="'tel:'+schooldetails.contact_number">{{ schooldetails.contact_number }}</a></p>
				          </div>
			          </div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-paper-plane"></span>
			        		</div>
			        		<div class="text">
				            <p><span>Email:</span> <a class="contactlink" :href="'mailto:'+schooldetails.contact_email">{{ schooldetails.contact_email }}</a></p>
				          </div>
			          </div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
			        		<div class="icon d-flex align-items-center justify-content-center">
			        			<span class="fa fa-globe"></span>
			        		</div>
			        		<div class="text">
				            <p><span>Website</span> <a class="contactlink" :href="schooldetails.school_domain">{{ schooldetails.school_domain }}</a></p>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
                </div>



    </div>
</template>

<script>


export default {

	created(){

  this.ASSETURL = ASSETURL
	},

	data () {
		return {
        schooldetails:{},

            ASSETURL: '',
            searchtype: '',
            field: 'id',
            sorttype: '',
            preloader: false,

		}
	},

	methods: {




            getSchoolData(){
            axios.get(`/api/school/settings?school_id=${this.school_id}&front=front`)
                .then(({ data }) => {
                    this.schooldetails = data;
                     this.preloader = false;
                })
                .catch()
        },





	},
	mounted(){
this.getSchoolData()


	}
}
</script>

<style>


a.contactlink {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease;
  color: #2553b8; }
  a.contactlink:hover, a.contactlink:focus {
    text-decoration: none !important;
    outline: none !important;
    -webkit-box-shadow: none;
    box-shadow: none; }




.contact-wrap {
  background: #e8edf0; }

.dbox {
  width: 100%;
  margin-bottom: 25px;
  padding: 0 20px; }
  @media (min-width: 768px) {
    .dbox {
      margin-bottom: 0;
      padding: 0; } }
  .dbox p {
    margin-bottom: 0; }
    .dbox p span {
      font-weight: 500;
      color: #000; }
    .dbox p a {
      color: #2553b8; }
  .dbox .icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #2553b8;
    margin: 0 auto;
    margin-bottom: 20px; }
    .dbox .icon span {
      font-size: 20px;
      color: #fff; }
  .dbox .text {
    width: 100%; }




.contactForm .label {
  color: #000;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 600; }

.contactForm .form-control {
  border: none; }


#contactForm .error {
  color: red;
  font-size: 12px; }

#contactForm .form-control {
  font-size: 16px; }

#message {
  resize: vertical; }

#form-message-warning, #form-message-success {
  display: none; }

#form-message-warning {
  color: red; }

#form-message-success {
  color: #28a745;
  font-size: 18px;
  font-weight: 500; }


</style>
