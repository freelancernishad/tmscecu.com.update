<template>
	<div>
        <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>
   <!-- Breadcubs Area Start Here -->
        <div class="breadcrumbs-area">
            <h3>Students</h3>
                  <ul>
                <li>
                    <router-link :to="{name:'home'}">Home</router-link>
                </li>
                <li>
                    <router-link  v-if="this.editid!=''" :to="{name:'students'}">Student</router-link> <span v-else>Admission Form</span>
                </li>
                <li v-if="this.editid!=''">{{ form.StudentName }}</li>
            </ul>
        </div>
        <!-- Breadcubs Area End Here -->
  <!-- Admit Form Area Start Here -->
  <div class="card height-auto">
    <div class="card-body">
                        <router-link  class="btn-fill-md radius-4 text-light bg-orange-red mb-3"
                             to="">
                            GO BACK
                        </router-link>
        <div class="heading-layout1">
            <div class="item-title">

            </div>
            <div class="dropdown">



            </div>
        </div>



        <form  enctype="multipart/form-data" v-on:submit.prevent="formsubmit" >

<fieldset class="col-md-12 mt-3" style="border: 2px solid;">
 <legend> <h3>Students Detials</h3></legend>


            <div class="row">
<!--


                <div class="col-md-4">
                    <div class="form-group">
                        <label>Admission ID:</label>
                        <input class="form-control" type="text"  placeholder="Enter Admission ID" v-model="form.AdmissionID" id="AdmissionID" readonly required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Student ID:</label>
                        <input class="form-control" type="text" placeholder="Enter Student ID" v-model="form.StudentID" id="StudentID" readonly required />
                    </div>
                </div>
 -->

 <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="নাম (বাংলা)" name="নাম (বাংলা)" v-model="form.StudentName"   />

                    </div>
                </div>



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">নাম (English)</label>
                        <input class="form-control" style="text-transform:uppercase"  type="text"  placeholder="নাম (English)" name="নাম (English)" v-model="form.StudentNameEn"  />

                    </div>
                </div>




                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">শ্রেণি</label>


                            <select  class="form-control"  style="width: 100%;" v-model="form.StudentClass" @change="checkRoll"  >
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>

                    </div>
                </div>

                <div class="col-md-4 mt-3" v-if="form.StudentClass=='Nine' || form.StudentClass=='Ten'" id="Sgroup" >
                    <div class="form-group">
                        <label class="form_label">গ্রুপ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGroup" @change="checkRoll"  >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>
                                Science
                            </option>
                            <option>
                                Humanities
                            </option>
                            <option>
                                Commerce
                            </option>
                        </select>

                    </div>
                    </div>

                <div class="col-md-4 mt-3" v-if="form.StudentClass=='Nine' || form.StudentClass=='Ten'" id="Sgsroup" >
                    <div class="form-group">
                        <label class="form_label">চতুর্থ বিষয়</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentSubject" >
                            <option value="Agriculture">কৃষি শিক্ষা</option>
                            <option value="Higher_Mathematics">উচ্চতর গণিত</option>

                        </select>

                    </div>
                    </div>



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">রোল</label>
                        <input class="form-control" style="text-transform:uppercase"  type="text" @keyup="checkRoll"  placeholder="রোল"  name="রোল" v-model="form.StudentRoll"   />
                    </div>
                    <span v-if="alredyhave" style="color:red">{{ form.StudentClass }} Already Have Roll {{ form.StudentRoll }}</span>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">এসএসসি রোল</label>
                        <input class="form-control" style="text-transform:uppercase"  type="text"  placeholder="এসএসসি রোল"  name="এসএসসি রোল" v-model="form.sscroll"   />
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">সাল</label>

                        <input class="form-control"  type="text"  placeholder="সাল"  name="সাল" v-model="form.Year"  required />
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">Status</label>
                        <select class="form-control"  type="text"  placeholder="Status"  name="Status" v-model="form.StudentStatus" required>
                            <option value="">Select</option>
                            <option>Active</option>
                            <option>old</option>
                        </select>
                        <!-- <input class="form-control"  type="text"  placeholder="সাল"  name="সাল" v-model="form.Year"   /> -->
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">লিঙ্গ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGender" >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option value="Male">
                                ছেলে
                            </option>
                            <option value="Female">
                                মেয়ে
                            </option>
                        </select>

                    </div>


                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">ধর্ম</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentReligion" >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option value="Islam">
                                ইসলাম
                            </option>
                            <option value="Hindu">
                                হিন্দু
                            </option>
                            <option value="Other">
                                অন্যান্য
                            </option>
                        </select>

                    </div>


                </div>




<!--
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">Student Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="form.StudentEmail" name="StudentEmail" data-vv-scope="step1"  />
                         <p class="help is-danger" v-show="errors.has('step1.StudentEmail')">
                             {{ errors.first('step1.StudentEmail') }}
                          </p>
                         <p class="help is-danger" v-show="studentEmailerror!=''">
                             {{ studentEmailerror }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">Student Password:</label>
                        <input class="form-control" type="password" name="StudentPassword"  placeholder="Enter Student Password" v-model="form.StudentPassword"  data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPassword')">
                             {{ errors.first('step1.StudentPassword') }}
                          </p>
                    </div>
                </div> -->



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="জন্ম নিবন্ধন নং"  name="জন্ম নিবন্ধন নং" v-model="form.StudentBirthCertificateNo"  />

                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">জন্ম তারিখ</label>
                        <input class="form-control" type="date"  placeholder="জন্ম তারিখ"  name="জন্ম তারিখ" v-model="form.StudentDateOfBirth"  />

                    </div>
                </div>


                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">উপবৃত্তি আছে কি না</label>
                        <select class="form-control" style="width: 100%;" v-model="form.stipend"  >
                            <option value="No">না</option>
                            <option value="Yes">হ্যাঁ</option>

                        </select>

                    </div>
                </div>



                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">শিক্ষার্থীর ধরন</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentCategory"  >
                            <option value="">নির্বাচন করুন</option>
                            <option>কর্মজীবী শিক্ষার্থী</option>
                            <option>ভূমিহীন অভিভাবকের সন্তান</option>
                            <option>মুক্তিযোদ্ধা পোষা/নাতি-নাতনি</option>
                            <option>ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী</option>
                            <option>বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী</option>
                            <option>অনাথ/এতিম শিক্ষা</option>
                            <option>অন্যান্য</option>
                        </select>

                    </div>
                    </div>


                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">কোটা</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentKota"  >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী</option>
                            <option>অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান</option>
                            <option>প্রতিবন্ধী</option>
                            <option>সাধারণ কোটা</option>
                            <option>কোন কোটা নেই</option>
                        </select>

                    </div>
                    </div>



                    <div class="col-md-4 mt-3" v-if="form.StudentKota=='মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী'">
                    <div class="form-group">
                        <label class="form_label">মুক্তিযোদ্ধার সনদ নং </label>
                        <input class="form-control" type="text"  placeholder="মুক্তিযোদ্ধা কোটা সনদ নং" v-model="form.StudentKotaSonodNo" name="মুক্তিযোদ্ধা কোটা সনদ নং"  />
                    </div>
                </div>





                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">পূর্বে অধ্যায়নরত স্কুল এর নাম </label>
                        <input class="form-control" type="text" name="পূর্বে অধ্যায়নরত স্কুল এর নাম" v-model="form.preSchool"  placeholder="পূর্বে অধ্যায়নরত স্কুল এর নাম" />

                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">পূর্বে অধ্যায়নরত শ্রেণি</label>

                        <select  class="form-control"  style="width: 100%;" v-model="form.preClass" >
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option>Five</option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>

                    </div>
                </div>


                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যায়নরত কি না</label>
                        <select class="form-control" style="width: 100%;" v-model="form.bigBroSis"  >
                            <option value="No">না</option>
                            <option value="Yes">হ্যাঁ</option>

                        </select>

                    </div>
                </div>




                <div class="col-md-4 mt-3" v-if="form.bigBroSis=='Yes'" >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের নাম</label>
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের নাম" name="অধ্যয়নরত ভাই/বোনের নাম" v-model="form.bigBroSisName"  required/>

                    </div>
                </div>




                <div class="col-md-4 mt-3"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের শ্রেণি</label>


                        <select  class="form-control"  style="width: 100%;" v-model="form.bigBroSisClass"  @change="checkStudent" >
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>

                        <!-- <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের শ্রেণি" v-model="form.bigBroSisClass"  /> -->

                    </div>
                </div>

                <div class="col-md-4 mt-3" v-if="form.bigBroSisClass=='Nine' || form.bigBroSisClass=='Ten'" id="Spgroup" >
                    <div class="form-group">
                        <label class="form_label">গ্রুপ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.bigBroSisGroup" @change="checkStudent"  >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>
                                Science
                            </option>
                            <option>
                                Humanities
                            </option>
                            <option>
                                Commerce
                            </option>
                        </select>

                    </div>
                    </div>

                <div class="col-md-4 mt-3"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের রোল</label>
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের রোল"  name="অধ্যয়নরত ভাই/বোনের রোল" v-model="form.bigBroSisRoll" @keyup="checkStudent"  />

                    </div>
                </div>











                <div class="col-md-4 mt-3">
                        <div class="form-group">
                            <label for=""  class="form_label">বিভাগ</label>

                            <select class='form-control' name="বিভাগ" id="division" v-model="Pdivision" @change="getdistrictFun"   >
                                <option value="">বিভাগ নির্বাচন করুন</option>
                                <option v-for="div in getdivisions" :key="div.id" :value="div.id">{{ div.bn_name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label for=""  class="form_label">জেলা</label>

                        <select class='form-control' name="জেলা" id="district" v-model="applicant_present_district" @change="getthanaFun"   >
                            <option value="">জেলা নির্বাচন করুন</option>
                            <option v-for="dist in getdistricts" :key="dist.id" :value="dist.id">{{ dist.bn_name }}
                            </option>
                        </select>
                    </div>
                </div>



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label for=""  class="form_label">উপজেলা/থানা</label>

                        <select class='form-control' name="উপজেলা/থানা" id="thana" v-model="thana" @change="getuniounFun"   >
                            <option value="">উপজেলা নির্বাচন করুন</option>
                            <option v-for="thana in getthanas" :key="thana.id" :value="thana.id">{{ thana.bn_name
                            }}</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label for=""  class="form_label">ইউনিয়ন</label>

                        <select class='form-control' name="ইউনিয়ন" id="thana" v-model="form.union"    >
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>
                            <option v-for="union in getuniouns" :key="union.id" :value="union.bn_name">{{ union.bn_name
                            }}</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label for=""  class="form_label">পোষ্ট অফিস</label>
                        <input type="text" class="form-control" name="পোষ্ট অফিস" v-model="form.post_office"   >
                    </div>

                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">গ্রাম</label>
                        <input class="form-control" type="text"  placeholder="গ্রাম" v-model="form.StudentAddress" name="গ্রাম"   />
                    </div>
                </div>






                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">মোবাইল নাম্বার</label>
                        <input class="form-control" type="text"  placeholder="মোবাইল নাম্বার"  name="মোবাইল নাম্বার" v-model="form.StudentPhoneNumber" maxlength="11" />

                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">পোস্টাল কোড / পোস্ট কোড</label>
                        <input class="form-control" type="text"  placeholder="পোস্টাল কোড / পোস্ট কোড"  name="পোস্টাল কোড / পোস্ট কোড" v-model="form.AreaPostalCode"  />

                    </div>
                </div>

                <div class="col-md-12 mb-3">
				<div class="fileUpload" style="    position: relative !important;">
				<label for="fileupload" id="fileChoiceLable">
					<img width="100%" height="100%" :src="form.StudentPicture" v-if="form.StudentPicture" alt="" />
                    <span style="text-align: center;" v-else >Click Here to Upload Student Image <br> 300x300</span>

				</label>
					<input type="file" id="fileupload" style="display:none"  @change="FileSelected($event, 'StudentPicture')" />

				</div>
            </div>




                </div>

      </fieldset>

            <fieldset class="col-md-12 mt-3" style="border: 2px solid;">
             <legend> <h3>Parents Detials</h3></legend>
<div class="row">





    <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="পিতার নাম (বাংলা)"  name="পিতার নাম (বাংলা)" v-model="form.StudentFatherNameBn" />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="পিতার নাম (English)" name="পিতার নাম (English)" v-model="form.StudentFatherName" style="text-transform:uppercase"  />

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="পিতার জাতীয় পরিচয় পত্র নং"  name="পিতার জাতীয় পরিচয় পত্র নং" v-model="form.StudentFatherNid"  />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="মাতার নাম (বাংলা)"  name="মাতার নাম (বাংলা)" v-model="form.StudentMotherNameBn"   />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="মাতার নাম (English)" name="মাতার নাম (English)" v-model="form.StudentMotherName"  style="text-transform:uppercase"   />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="মাতার জাতীয় পরিচয় পত্র নং"  name="মাতার জাতীয় পরিচয় পত্র নং" v-model="form.StudentMotherNid"  />

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="পিতার জন্ম নিবন্ধন নং"  name="পিতার জন্ম নিবন্ধন নং" v-model="form.StudentFatherBCN"  />

                    </div>
                </div>





                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="মাতার জন্ম নিবন্ধন নং" name="মাতার জন্ম নিবন্ধন নং" v-model="form.StudentMotherBCN"  />

                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতা/মাতা না থাকলে অভিভাবকের নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের নাম (বাংলা)"  name="পিতা/মাতা না থাকলে অভিভাবকের নাম (বাংলা)" v-model="form.guardName"  />

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতা/মাতা না থাকলে অভিভাবকের নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের নাম (English)"  v-model="form.guardName" name="পিতা/মাতা না থাকলে অভিভাবকের নাম (English)" />
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের জাতীয় পরিচয় পত্র</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং" name="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং" v-model="form.guardNid"  />

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের সাথে শিক্ষার্থীর সম্পর্ক</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং" v-model="form.guardRalation" name="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং" />

                    </div>
                </div>





                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের মাসিক আয়</label>
                        <input class="form-control" type="text"  placeholder="অভিভাবকের মাসিক আয়" name="অভিভাবকের মাসিক আয়" v-model="form.parentEarn"  />

                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের পেশা</label>


                        <select class="form-control" style="width: 100%;" v-model="form.StudentFatherOccupation" name="অভিভাবকের পেশা"  >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>ব্যবসায়ি</option>
                            <option>কৃষক</option>
                            <option>কৃষি শ্রমিক</option>
                            <option>ডাক্তার</option>
                            <option>জেলে</option>
                            <option>সরকারি চাকুরি</option>
                            <option>কামার/কুমোর</option>
                            <option>প্রবাসি</option>
                            <option>ক্ষুদ্র ব্যবসায়ি</option>
                            <option>শিক্ষক</option>
                            <option>অকৃষি শ্রমিক</option>
                            <option>অন্যান্য</option>
                        </select>


                    </div>
                </div>


                </div>
</fieldset>
<div class="row">

                <div class="col-md-12" >
                    <div class="form-group">

                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">SAVE DATA</button>


                    </div>
                </div>





            </div>



        </form>





    </div>
</div>


	</div>
</template>

<script>


export default {

	created(){
		if (!User.loggedIn()) {
			this.$router.push({name: '/'})
		}
             this.form.school_id = this.school_id
	},

	data () {
		return {
            form:{
                id:null,
            school_id:null,
            Year:new Date().getFullYear(),
            AdmissionID:null,
            StudentID:null,
            StudentRoll:null,
            StudentClass:null,
            StudentGender:null,
            StudentReligion:null,
            StudentName:null,
            StudentNameEn:null,
            StudentFatherNameBn:null,
            StudentFatherName:null,
            StudentMotherNameBn:null,
            StudentMotherName:null,
            StudentFatherNid:null,
            StudentMotherNid:null,
            StudentFatherBCN:null,
            StudentMotherBCN:null,
            guardNameBn:null,
            guardName:null,
            guardNid:null,
            guardRalation:null,
            StudentFatherOccupation:null,
            parentEarn:null,
            StudentMotherOccupation:null,
            ParentEmail:null,
            ParentPassword:null,
            StudentEmail:null,
            StudentPassword:null,
            StudentDateOfBirth:null,
            StudentBirthCertificateNo:null,
            StudentCategory:'অন্যান্য',
            stipend:'No',
            StudentKota:'সাধারণ কোটা',
            StudentKotaSonodNo:null,
            preSchool:null,
            preClass:null,
            bigBroSis:"No",
            bigBroSisName:null,
            bigBroSisClass:'',
            bigBroSisGroup:'Humanities',
            StudentSubject:'Agriculture',
            bigBroSisRoll:null,
            StudentGroup:'Humanities',
            StudentAddress:null,
            division:null,
            district:null,
            upazila:null,
            union:'টেপ্রীগঞ্জ',
            post_office:'টেপ্রীগঞ্জ',
            StudentPhoneNumber:null,
            AreaPostalCode:'5020',
            StudentStatus:'Pending',
            StudentTranferFrom:null,
            StudentPicture:null,
            JoiningDate:null,
            StudentTranferStatus:null,
            AplicationStatus:null,
            ThisMonthPaymentStatus:null,
            },

            editid:'',
            classdisable:false,
            alredyhave:false,
            preloader: true,


            bissisBroDetails: {},

            getdivisions: {},
            getdistricts: {},
            getthanas: {},
            getuniouns: {},

            Pdivision: '',
            Perdivision: '',
            applicant_present_district: '',
            thana: '',
            applicant_permanent_district: '',



		}
	},

	methods: {




        FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            // console.log(file)
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {


console.log(event.target.result)

   //Initiate the JavaScript Image object.
   var image = new Image();

 //Set the Base64 string return from FileReader as source.
 image.src = event.target.result;

 //Validate the File Height and Width.

 var formThis = this;

 image.onload = function () {
    var height = this.height;
     var width = this.width;
    //  console.log( width,height)
     if (height===width) {
        formThis.form[parent_index] = event.target.result
         return false;
     }
     alert("Uploaded image has valid Height and Width.");
     return true;
 };











                };
                reader.readAsDataURL(file)
            }
            //   console.log($event.target.result);
        },

      async checkRoll(){

        if(!this.$route.params.id){

        // if(this.form.StudentClass=='Nine' || this.form.StudentClass=='Ten'){
        // }else{
        //     this.form.StudentGroup = '';
        // }
        var res = await this.callApi('get',`/api/check/student/roll?StudentRoll=${this.form.StudentRoll}&StudentClass=${this.form.StudentClass}&StudentGroup=${this.form.StudentGroup}`,[]);
        this.alredyhave = res.data;

    }
        },


      async checkStudent(){


            // this.form.bigBroSisGroup = 'Humanities';

        var res = await this.callApi('get',`/api/check/student/roll?StudentRoll=${this.form.bigBroSisRoll}&StudentClass=${this.form.bigBroSisClass}&StudentGroup=${this.form.bigBroSisGroup}&bigsis=1`,[]);
        // this.bissisBroDetails = res.data;
        this.form.bigBroSisName = res.data.StudentName


        },

        getstudent(){
                axios.get(`/api/students/single?filter[id]=${this.editid}`)
                                .then(({data}) => {
                                    //  console.log(data)
                                    this.form = data[0]

                                    this.form.StudentPicture = this.$asseturl+data[0].StudentPicture

                                              this.preloader = false;
                                })
                                .catch(() => {
                                    // this.$router.push({name: 'supplier'})
                                })
        },




        async getdivisionFun() {
            var res = await this.callApi('get', `/api/getdivisions`, []);
            this.getdivisions = res.data;
        },

        async getdistrictFun() {
            var resdiv = await this.callApi('get', `/api/getdivisions?id=${this.Pdivision}`, []);
            // console.log(resdiv)
            this.form.division= resdiv.data.bn_name
            var res = await this.callApi('get', `/api/getdistrict?id=${this.Pdivision}`, []);
            this.getdistricts = res.data;




        },

        async getthanaFun() {
            var res = await this.callApi('get', `/api/getthana?id=${this.applicant_present_district}`, []);
            this.getthanas = res.data;
            var resOwn = await this.callApi('get', `/api/getdistrict?ownid=${this.applicant_present_district}`, []);
            this.form.district = resOwn.data.bn_name

        },

        async getuniounFun() {


            var ress = await this.callApi('get', `/api/getthana?ownid=${this.thana}`, []);
            // console.log(ress.data.bn_name);
            this.form.upazila = ress.data.bn_name;
            // this.getuniouns = ress.data;

            var res = await this.callApi('get', `/api/getunioun?id=${this.thana}`, []);
            this.getuniouns = res.data;


        },





       async formsubmit(){

        // if(this.form.StudentPicture){
            if(this.alredyhave){
                Notification.customError(`${this.form.StudentClass} Already Have Roll ${this.form.StudentRoll}`);
            }else{
                this.preloader = true;
                var res = await this.callApi('post',`/api/students/form/submit?submit_type=data_entry`,this.form);

                console.log(res)
                // this.$router.push({name: 'students'})


                this.$router.go(-1)



                Notification.success();

            }
        // }else{
        //    Notification.customError2('Student image is required!');
        //    this.preloader = false;
        // }
            this.preloader = false;

        }


	},
	mounted(){



       if(this.$route.params.id){

           this.editid = this.$route.params.id;

       }else{

              this.preloader = false;
              this.checkRoll();
       }
       if(this.editid!=''){

           this.getstudent();
           this.classdisable  = true
       }


       this.getdivisionFun();
        this.Pdivision = 7
        this.applicant_present_district = 53
        this.thana = 400
        this.form.union = 'টেপ্রীগঞ্জ'
        setTimeout(() => {
            this.getdistrictFun()
            setTimeout(() => {
                this.getthanaFun();
                setTimeout(() => {
                this.getuniounFun();
            }, 500);
            }, 500);

        }, 500);






	}
}
</script>

<style lang="css" scoped>
#img_size{
	width: 40px;
}



.fileUpload {
    width: 195px;
    height: 195px;
    border: 1px solid;
	position: absolute;
    top: 0;
    right: 0;
}
#fileChoiceLable{
	width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

</style>
