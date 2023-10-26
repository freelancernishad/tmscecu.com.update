<template>
  <div class="container my-5">
    <loader v-if="preloader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="25" speed="2"
            bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="loading"></loader>

        <ul class="steps has-content-centered">
            <li class="steps-segment" v-for="tab in tabs" :class="{ 'is-active': tab.isActive }" v-bind:key="tab.name">
                <span class="steps-marker"></span>
                <div class="steps-content">
                    <p class="is-size-4">{{tab.name}}</p>
                    <p>{{tab.info}}</p>
                </div>
            </li>
        </ul>
        <div class="tab-details">


 <tab name="ছাত্র-ছাত্রীর তথ্য"  :selected="true">



 <div class="row">
<!--

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">ভর্তি আইডি</label>
                        <input class="form-control" type="text"  placeholder="Enter Admission ID" v-model="form.AdmissionID" name="AdmissionID" readonly v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.AdmissionID')">
                             {{ errors.first('step1.AdmissionID') }}
                          </p>
                    </div>
                </div> -->






                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="নাম (বাংলা)" v-model="form.StudentName" name="নাম-(বাংলা)" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.নাম-(বাংলা)')">
                             {{ errors.first('step1.নাম-(বাংলা)') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">নাম (English)</label>
                        <input class="form-control" style="text-transform:uppercase"  type="text"  placeholder="নাম (English)" v-model="form.StudentNameEn" name="নাম (English)" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.নাম (English)')">
                             {{ errors.first('step1.নাম (English)') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">যে শ্রেণিতে ভর্তি হতে ইচ্ছুক</label>


                            <select  class="form-control"  style="width: 100%;" v-model="form.StudentClass" name="যে শ্রেণিতে ভর্তি হতে ইচ্ছুক"  v-validate="'required'" data-vv-scope="step1">
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option v-for="(classlist,classindex) in classess" :key="'class'+classindex">{{ classlist }}</option>
                            </select>
                         <p class="help is-danger" v-show="errors.has('step1.যে শ্রেণিতে ভর্তি হতে ইচ্ছুক')">
                             {{ errors.first('step1.যে শ্রেণিতে ভর্তি হতে ইচ্ছুক') }}
                          </p>
                    </div>


                </div>



                <div class="col-md-4" v-if="form.StudentClass=='Nine' || form.StudentClass=='Ten'" id="Sgroup" >
                    <div class="form-group">
                        <label class="form_label">গ্রুপ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGroup" name="গ্রুপ" v-validate="'required'" data-vv-scope="step1" >
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
                         <p class="help is-danger" v-show="errors.has('step1.গ্রুপ')">
                             {{ errors.first('step1.গ্রুপ') }}
                          </p>
                    </div>
                    </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">লিঙ্গ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGender" name="লিঙ্গ" v-validate="'required'" data-vv-scope="step1">
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
                         <p class="help is-danger" v-show="errors.has('step1.লিঙ্গ')">
                             {{ errors.first('step1.লিঙ্গ') }}
                          </p>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">ধর্ম</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentReligion" name="ধর্ম" v-validate="'required'" data-vv-scope="step1">
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option value="Islam">
                                ইসলাম
                            </option>
                            <option value="Hindu">
                                হিন্দু
                            </option>
                            <option value="Buddhist">
                                বৌদ্ধ
                            </option>
                            <option value="Christian">
                                খ্রিষ্টান
                            </option>

                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.ধর্ম')">
                             {{ errors.first('step1.ধর্ম') }}
                          </p>
                    </div>


                </div>




<!--
                <div class="col-md-4">
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


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">Student Password:</label>
                        <input class="form-control" type="password" name="StudentPassword"  placeholder="Enter Student Password" v-model="form.StudentPassword"  data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPassword')">
                             {{ errors.first('step1.StudentPassword') }}
                          </p>
                    </div>
                </div> -->



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="জন্ম নিবন্ধন নং" v-model="form.StudentBirthCertificateNo" name="জন্ম নিবন্ধন নং" maxlength="17" v-validate="'required|length:17|max:17'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.জন্ম নিবন্ধন নং')">
                             {{ errors.first('step1.জন্ম নিবন্ধন নং') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">জন্ম তারিখ</label>
                        <input class="form-control" type="date"  placeholder="জন্ম তারিখ" v-model="form.StudentDateOfBirth" name="জন্ম তারিখ" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.জন্ম তারিখ')">
                             {{ errors.first('step1.জন্ম তারিখ') }}
                          </p>
                    </div>
                </div>




                <div class="col-md-4"  >
                    <div class="form-group">
                        <label class="form_label">শিক্ষার্থীর ধরন</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentCategory" name="শিক্ষার্থীর-ধরন" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">নির্বাচন করুন</option>
                            <option>কর্মজীবী শিক্ষার্থী</option>
                            <option>ভূমিহীন অভিভাবকের সন্তান</option>
                            <option>ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী</option>
                            <option>বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী</option>
                            <option>অনাথ/এতিম শিক্ষার্থী</option>
                            <option>অন্যান্য</option>
                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.শিক্ষার্থীর-ধরন')">
                             {{ errors.first('step1.শিক্ষার্থীর-ধরন') }}
                          </p>
                    </div>
                    </div>


                <div class="col-md-4"  >
                    <div class="form-group">
                        <label class="form_label">কোটা</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentKota" name="কোটা" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী</option>
                            <option>অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান</option>
                            <option>প্রতিবন্ধী</option>
                            <!-- <option>সাধারণ কোটা</option> -->
                            <option>কোনো কোটা নেই</option>
                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.কোটা')">
                             {{ errors.first('step1.কোটা') }}
                          </p>
                    </div>
                    </div>

                    <div class="col-md-4" v-if="form.StudentKota=='মুক্তিযোদ্ধার সন্তান/নাতী-নাতনী'">
                    <div class="form-group">
                        <label class="form_label">মুক্তিযোদ্ধার সনদ নং </label>
                        <input class="form-control" type="text"  placeholder="মুক্তিযোদ্ধা কোটা সনদ নং" v-model="form.StudentKotaSonodNo" name="মুক্তিযোদ্ধা কোটা সনদ নং" v-validate="'required'"   data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.মুক্তিযোদ্ধা কোটা সনদ নং')">
                             {{ errors.first('step1.মুক্তিযোদ্ধা কোটা সনদ নং') }}
                          </p>
                    </div>
                </div>





                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পূর্বে অধ্যয়নরত স্কুলের নাম </label>
                        <input class="form-control" type="text"  placeholder="পূর্বে অধ্যয়নরত স্কুলের নাম" v-model="form.preSchool" name="পূর্বে অধ্যয়নরত স্কুলের নাম" v-validate="'required'"   data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.পূর্বে অধ্যয়নরত স্কুলের নাম')">
                             {{ errors.first('step1.পূর্বে অধ্যয়নরত স্কুলের নাম') }}
                          </p>
                    </div>
                </div>




                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পূর্বে অধ্যয়নরত শ্রেণি</label>

                        <select  class="form-control"  style="width: 100%;" v-model="form.preClass" name="পূর্বে অধ্যয়নরত শ্রেণি"  v-validate="'required'" data-vv-scope="step1">
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option>Five</option>
                                <option v-for="(classlist,clIn) in classess" :key="'cls'+clIn">{{ classlist }}</option>
                            </select>
                         <p class="help is-danger" v-show="errors.has('step1.পূর্বে অধ্যয়নরত শ্রেণি')">
                             {{ errors.first('step1.পূর্বে অধ্যয়নরত শ্রেণি') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4"  >
                    <div class="form-group">
                        <label class="form_label">কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যয়নরত কি না</label>
                        <select class="form-control" style="width: 100%;" v-model="form.bigBroSis" name="কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যয়নরত কি না" v-validate="'required'" data-vv-scope="step1" >
                            <option value="No">না</option>
                            <option value="Yes">হ্যাঁ</option>

                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যয়নরত কি না')">
                             {{ errors.first('step1.কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যয়নরত কি না') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4" v-if="form.bigBroSis=='Yes'" >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের নাম</label>
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের নাম" v-model="form.bigBroSisName" name="অধ্যয়নরত ভাই/বোনের নাম" v-validate="'required'"   data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.অধ্যয়নরত ভাই/বোনের নাম')">
                             {{ errors.first('step1.অধ্যয়নরত ভাই/বোনের নাম') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের শ্রেণি</label>

                        <select  class="form-control"  style="width: 100%;" v-model="form.bigBroSisClass" name="অধ্যয়নরত ভাই/বোনের শ্রেণি" @change="checkStudent"  v-validate="'required'" data-vv-scope="step1">
                                <option value="">
                                    নির্বাচন করুন
                                </option>
                                <option v-for="(classlist,classindex) in classess" :key="'class'+classindex">{{ classlist }}</option>
                            </select>

<!--
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের শ্রেণি" v-model="form.bigBroSisClass" name="অধ্যয়নরত ভাই/বোনের শ্রেণি" v-validate="'required'"   data-vv-scope="step1" /> -->
                         <p class="help is-danger" v-show="errors.has('step1.অধ্যয়নরত ভাই/বোনের শ্রেণি')">
                             {{ errors.first('step1.অধ্যয়নরত ভাই/বোনের শ্রেণি') }}
                          </p>
                    </div>
                </div>




                <div class="col-md-4" v-if="form.bigBroSisClass=='Nine' || form.bigBroSisClass=='Ten'" id="Spgroup" >
                    <div class="form-group">
                        <label class="form_label">গ্রুপ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.bigBroSisGroup" name="ভাই/বোনের গ্রুপ" @change="checkStudent" v-validate="'required'" data-vv-scope="step1"  >
                            <option value="">
                                নির্বাচন করুন
                            </option>
                            <option>Science</option>
                            <option>Humanities</option>
                        </select>
                        <p class="help is-danger" v-show="errors.has('step1.ভাই/বোনের গ্রুপ')">
                             {{ errors.first('step1.ভাই/বোনের গ্রুপ') }}
                          </p>
                    </div>
                    </div>




                <div class="col-md-4"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের রোল</label>
                        <input class="form-control" type="text"  placeholder="অধ্যয়নরত ভাই/বোনের রোল" v-model="form.bigBroSisRoll" name="অধ্যয়নরত ভাই/বোনের রোল" @keyup="checkStudent" v-validate="'required'"   data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.অধ্যয়নরত ভাই/বোনের রোল')">
                             {{ errors.first('step1.অধ্যয়নরত ভাই/বোনের রোল') }}
                          </p>
                    </div>
                </div>






                <div class="col-md-4">
                        <div class="form-group">
                            <label for=""  class="form_label">বিভাগ</label>

                            <select class='form-control' name="বিভাগ" id="division" v-model="Pdivision" @change="getdistrictFun" v-validate="'required'" data-vv-scope="step1" >
                                <option value="">বিভাগ নির্বাচন করুন</option>
                                <option v-for="div in getdivisions" :key="div.id" :value="div.id">{{ div.bn_name }}
                                </option>
                            </select>
                            <p class="help is-danger" v-show="errors.has('step1.বিভাগ')">
                             {{ errors.first('step1.বিভাগ') }}
                          </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">জেলা</label>

                        <select class='form-control' name="জেলা" id="district" v-model="applicant_present_district" @change="getthanaFun" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">জেলা নির্বাচন করুন</option>
                            <option v-for="dist in getdistricts" :key="dist.id" :value="dist.id">{{ dist.bn_name }}
                            </option>
                        </select>
                        <p class="help is-danger" v-show="errors.has('step1.জেলা')">
                             {{ errors.first('step1.জেলা') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">উপজেলা/থানা</label>

                        <select class='form-control' name="উপজেলা/থানা" id="thana" v-model="thana" @change="getuniounFun" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">উপজেলা নির্বাচন করুন</option>
                            <option v-for="thana in getthanas" :key="thana.id" :value="thana.id">{{ thana.bn_name
                            }}</option>
                        </select>

                        <p class="help is-danger" v-show="errors.has('step1.উপজেলা/থানা')">
                             {{ errors.first('step1.উপজেলা/থানা') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">ইউনিয়ন</label>

                        <select class='form-control' name="ইউনিয়ন" id="thana" v-model="form.union"  v-validate="'required'" data-vv-scope="step1" >
                            <option value="">ইউনিয়ন নির্বাচন করুন</option>
                            <option v-for="union in getuniouns" :key="union.id" :value="union.bn_name">{{ union.bn_name
                            }}</option>
                        </select>

                        <p class="help is-danger" v-show="errors.has('step1.ইউনিয়ন')">
                             {{ errors.first('step1.ইউনিয়ন') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for=""  class="form_label">পোষ্ট অফিস</label>
                        <input type="text" class="form-control" name="পোষ্ট অফিস" v-model="form.post_office" v-validate="'required'" data-vv-scope="step1" >
                        <p class="help is-danger" v-show="errors.has('step1.পোষ্ট অফিস')">
                             {{ errors.first('step1.পোষ্ট অফিস') }}
                          </p>

                    </div>

                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">গ্রাম</label>
                        <input class="form-control" type="text"  placeholder="গ্রাম" v-model="form.StudentAddress" name="গ্রাম" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.গ্রাম')">
                             {{ errors.first('step1.গ্রাম') }}
                          </p>
                    </div>
                </div>








                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মোবাইল নাম্বার</label>
                        <input class="form-control" type="text"  placeholder="মোবাইল নাম্বার" v-model="form.StudentPhoneNumber" name="মোবাইল নাম্বার" maxlength="11" v-validate="'required|length:11|max:11'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.মোবাইল নাম্বার')">
                             {{ errors.first('step1.মোবাইল নাম্বার') }}
                          </p>
                    </div>
                </div>




                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পোস্টাল কোড / পোস্ট কোড</label>
                        <input class="form-control" type="text"  placeholder="পোস্টাল কোড / পোস্ট কোড" v-model="form.AreaPostalCode" name="পোস্টাল কোড / পোস্ট কোড" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.পোস্টাল কোড / পোস্ট কোড')">
                             {{ errors.first('step1.পোস্টাল কোড / পোস্ট কোড') }}
                          </p>
                    </div>
                </div>




                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">ছাত্র/ছাত্রীর জন্ম নিবন্ধন কপি </label>
                            <input type="file" id="fileupload2" class="form-control"  @change="FileSelected2($event, 'StudentBirthC')" required />
                            <label for="fileupload2">
                            <img width="100%" height="100%" :src="form.StudentBirthC" v-if="form.StudentBirthC" alt="" />
                        </label>
                    </div>
                </div>




                <div class="col-md-12">
                    <div class="fileUpload" style="    position: relative !important;">
                        <label for="fileupload" id="fileChoiceLable">
                            <img width="100%" height="100%" :src="form.StudentPicture" v-if="form.StudentPicture" alt="" />
                            <span style="text-align: center;" v-else >Click Here to Upload Student Image <br> 300x300</span>
                        </label>
                            <input type="file" id="fileupload" style="display:none"  @change="FileSelected($event, 'StudentPicture')" />
                    </div>
                </div>


                </div>











          </tab>
          <tab name="অভিভাবকের তথ্য" data-vv-scope="step2">
           <div class="row">





                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="পিতার নাম (বাংলা)" v-model="form.StudentFatherNameBn" name="পিতার নাম (বাংলা)"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতার নাম (বাংলা)')">
                             {{ errors.first('step2.পিতার নাম (বাংলা)') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="পিতার নাম (English)" v-model="form.StudentFatherName" name="পিতার নাম (English)" style="text-transform:uppercase"   v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতার নাম (English)')">
                             {{ errors.first('step2.পিতার নাম (English)') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="পিতার জাতীয় পরিচয় পত্র নং" v-model="form.StudentFatherNid" name="পিতার জাতীয় পরিচয় পত্র নং"  v-validate="'required|length:10,17'" maxlength="17" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতার জাতীয় পরিচয় পত্র নং')">
                             {{ errors.first('step2.পিতার জাতীয় পরিচয় পত্র নং') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="মাতার নাম (বাংলা)" v-model="form.StudentMotherNameBn" name="মাতার নাম (বাংলা)"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.মাতার নাম (বাংলা)')">
                             {{ errors.first('step2.মাতার নাম (বাংলা)') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="মাতার নাম (English)" v-model="form.StudentMotherName" name="মাতার নাম (English)" style="text-transform:uppercase"   v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.মাতার নাম (English)')">
                             {{ errors.first('step2.মাতার নাম (English)') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="মাতার জাতীয় পরিচয় পত্র নং" v-model="form.StudentMotherNid" name="মাতার জাতীয় পরিচয় পত্র নং"  v-validate="'required|length:10,17'" maxlength="17" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.মাতার জাতীয় পরিচয় পত্র নং')">
                             {{ errors.first('step2.মাতার জাতীয় পরিচয় পত্র নং') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text" v-validate="'length:17|max:17'"  placeholder="পিতার জন্ম নিবন্ধন নং" v-model="form.StudentFatherBCN" name="পিতার জন্ম নিবন্ধন নং" maxlength="17"  data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতার জন্ম নিবন্ধন নং')">
                             {{ errors.first('step2.পিতার জন্ম নিবন্ধন নং') }}
                          </p>
                    </div>
                </div>





                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text" v-validate="'length:17|max:17'" placeholder="মাতার জন্ম নিবন্ধন নং" v-model="form.StudentMotherBCN" name="মাতার জন্ম নিবন্ধন নং" maxlength="17" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.মাতার জন্ম নিবন্ধন নং')">
                             {{ errors.first('step2.মাতার জন্ম নিবন্ধন নং') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতা/মাতা না থাকলে অভিভাবকের নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের নাম" v-model="form.guardNameBn" name="পিতা/মাতা না থাকলে অভিভাবকের নাম"  data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতা/মাতা না থাকলে অভিভাবকের নাম')">
                             {{ errors.first('step2.পিতা/মাতা না থাকলে অভিভাবকের নাম') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতা/মাতা না থাকলে অভিভাবকের নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের নাম" v-model="form.guardName" name="পিতা/মাতা না থাকলে অভিভাবকের নাম"  data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতা/মাতা না থাকলে অভিভাবকের নাম')">
                             {{ errors.first('step2.পিতা/মাতা না থাকলে অভিভাবকের নাম') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং" v-model="form.guardNid" name="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং"  data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং')">
                             {{ errors.first('step2.পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের সাথে শিক্ষার্থীর সম্পর্ক</label>
                        <input class="form-control" type="text"  placeholder="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং" v-model="form.guardRalation" name="পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং"  data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং')">
                             {{ errors.first('step2.পিতা/মাতা না থাকলে অভিভাবকের জাতীয় পরিচয় পত্র নং') }}
                          </p>
                    </div>
                </div>







                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের মাসিক আয়</label>
                        <input class="form-control" type="text"  placeholder="অভিভাবকের মাসিক আয়" v-model="form.parentEarn" name="অভিভাবকের মাসিক আয়"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.অভিভাবকের মাসিক আয়')">
                             {{ errors.first('step2.অভিভাবকের মাসিক আয়') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের পেশা</label>


                        <select class="form-control" style="width: 100%;" v-model="form.StudentFatherOccupation" name="অভিভাবকের পেশা" v-validate="'required'" data-vv-scope="step2" >
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

                         <p class="help is-danger" v-show="errors.has('step2.অভিভাবকের পেশা')">
                             {{ errors.first('step2.অভিভাবকের পেশা') }}
                          </p>
                    </div>
                </div>











                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form_label">পিতার আইডি কার্ডের সামনের কপি</label>
                            <input type="file" id="fileupload2" class="form-control"  @change="FileSelected2($event, 'fatherNidF')" required />
                            <label for="fileupload2">
                            <img width="100%" height="100%" :src="form.fatherNidF" v-if="form.fatherNidF" alt="" />
                        </label>
                    </div>
                </div>




                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form_label">পিতার আইডি কার্ডের পিছনের কপি</label>
                            <input type="file" id="fileupload2" class="form-control"  @change="FileSelected2($event, 'fatherNidB')" required />
                            <label for="fileupload2">
                            <img width="100%" height="100%" :src="form.fatherNidB" v-if="form.fatherNidB" alt="" />
                        </label>
                    </div>
                </div>





                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form_label">মাতার আইডি কার্ডের সামনের কপি</label>
                            <input type="file" id="fileupload2" class="form-control"  @change="FileSelected2($event, 'motherNidF')" required />
                            <label for="fileupload2">
                            <img width="100%" height="100%" :src="form.motherNidF" v-if="form.motherNidF" alt="" />
                        </label>
                    </div>
                </div>




                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form_label">মাতার আইডি কার্ডের পিছনের কপি</label>
                            <input type="file" id="fileupload2" class="form-control"  @change="FileSelected2($event, 'motherNidB')" required />
                            <label for="fileupload2">
                            <img width="100%" height="100%" :src="form.motherNidB" v-if="form.motherNidB" alt="" />
                        </label>
                    </div>
                </div>







<!--


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">Mother Occupation:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Occupation" v-model="form.StudentMotherOccupation" name="StudentMotherOccupation"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentMotherOccupation')">
                             {{ errors.first('step2.StudentMotherOccupation') }}
                          </p>
                    </div>
                </div> -->

<!--
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">Parent Email:</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Email" v-model="form.ParentEmail" name="ParentEmail"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.ParentEmail')">
                             {{ errors.first('step2.ParentEmail') }}
                          </p>

                            <p class="help is-danger" v-show="parentEmailerror!=''">
                             {{ parentEmailerror }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">Parent Password:</label>
                        <input class="form-control" type="password"  placeholder="Enter Student Password" v-model="form.ParentPassword" name="ParentPassword"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.ParentPassword')">
                             {{ errors.first('step2.ParentPassword') }}
                          </p>
                    </div>
                </div> -->


                </div>
          </tab>
          <tab name="তথ্য যাচাই" >
          <!-- <tab name="তথ্য যাচাই" info="Finishing Up" > -->




    <div class="rootContainer">

        <div class="headerSection">

            <div class="topHeadSection" style="text-align: center;position:relative;display: flex;justify-content: space-evenly;align-items: center;height: 200px;">
			   <div class="titleHead"  style="text-align: center;">
                <h3>টেপ্রীগঞ্জ আদর্শ দ্বি-মুখী উচ্চ বিদ্যালয়</h3>
                <p>টেপ্রীগঞ্জ, দেবীগঞ্জ, পঞ্চগড়</p>
                <p>শিক্ষাবর্ষ-২০২৩ খ্রি</p>
					</div>

				<div class="fileUpload">
				<label for="fileupload" id="fileChoiceLable">
					<img width="100%" height="100%" :src="form.StudentPicture" v-if="form.StudentPicture" alt="" />
                    <span style="text-align: center;" v-else >Click Here to Upload Student Image <br> 300x300</span>

				</label>
					<input type="file" id="fileupload" style="display:none"  @change="FileSelected($event, 'StudentPicture')" />

				</div>


            </div>

            <table class="tableTag" width="100%" style="margin-top:20px ;margin-bottom:20px ;">

                <tr>
                    <th>শ্রেণিঃ {{ form.StudentClass }}</th>
                    <th>ধর্মঃ {{ form.StudentReligion }}</th>
                    <th>লিঙ্গঃ {{ form.StudentGender }}</th>
                    <th>গ্রুপঃ {{ form.StudentGroup }}</th>
                </tr>

                <tr>
                    <th>শিক্ষার্থীর নাম (বাংলা) </th>
                    <th>শিক্ষার্থীর নাম (English) </th>
                    <th>শিক্ষার্থীর জন্ম তারিখ </th>
                    <th>শিক্ষার্থীর জন্ম নিবন্ধন নং </th>

                </tr>
                <tr>
                    <td> {{ form.StudentName }}</td>
                    <td style="text-transform:uppercase"> {{ form.StudentNameEn }}</td>
                    <td> {{ dateformatGlobal(form.StudentDateOfBirth)[3] }}</td>
                    <td> {{ form.StudentBirthCertificateNo }}</td>

                </tr>
                <tr>
                    <th>পিতার নাম (বাংলা) </th>
                    <th>পিতার নাম (English) </th>
                    <th>পিতার জাতীয় পরিচয়পত্র নং </th>
                    <th>পিতার জন্ম নিবন্ধন নং </th>

                </tr>
                <tr>
                    <td>{{ form.StudentFatherNameBn }}</td>
                    <td style="text-transform:uppercase">{{ form.StudentFatherName }}</td>
                    <td>{{ form.StudentFatherNid }}</td>
                    <td>{{ form.StudentFatherBCN }}</td>

                </tr>
                <tr>
                    <th>মাতার নাম (বাংলা) </th>
                    <th>মাতার নাম (English) </th>
                    <th>মাতার জাতীয় পরিচয়পত্র নং </th>
                    <th>মাতার জন্ম নিবন্ধন নং </th>

                </tr>
                <tr>
                    <td>{{ form.StudentMotherNameBn }}</td>
                    <td style="text-transform:uppercase">{{ form.StudentMotherName }}</td>
                    <td>{{ form.StudentMotherNid }}</td>
                    <td>{{ form.StudentMotherBCN }}</td>

                </tr>

                <tr>
                    <th>পিতা/মাতা জীবিত না থাকলে অভিভাবকের নাম (বাংলা)</th>
                    <th>অভিভাবকের নাম (English) </th>
                    <th>অভিভাবকের জাতীয় পরিচয়পত্র নং </th>
                    <th>অভিভাবকের সাথে শিক্ষার্থীর সম্পর্ক </th>
                </tr>
                <tr>
                    <td>{{ form.guardNameBn }}</td>
                    <td style="text-transform:uppercase">{{ form.guardName }}</td>
                    <td>{{ form.guardNid }}</td>
                    <td >{{ form.guardRalation }}</td>

                </tr>
                <tr>
                    <th>অভিভাবকের পেশা</th>


                    <td colspan="3">{{ form.StudentFatherOccupation }}</td>
                </tr>
                <tr>
                    <th>অভিভাবকের মাসিক আয়</th>


                    <td colspan="3">{{ form.parentEarn }}</td>
                </tr>
                <tr>
                    <th>মোবাইল নাম্বার</th>


                    <td colspan="3">{{ form.StudentPhoneNumber }}</td>
                </tr>

                <tr>
                    <th colspan="2">শিক্ষার্থীর ধরন</th>
                    <th colspan="2">শিক্ষার্থীর কোটা</th>

                </tr>
                <tr>
                    <td colspan="2">{{ form.StudentCategory }}</td>
                    <td colspan="2">{{ form.StudentKota }}</td>


                </tr>

                <tr>
                    <th colspan="2">পূর্বে অধ্যায়নরত স্কুল এর নাম</th>
                    <th colspan="2">পূর্বে অধ্যায়নরত শ্রেণি</th>

                </tr>
                <tr>
                    <td colspan="2">{{ form.preSchool }}</td>
                    <td colspan="2">{{ form.preClass }}</td>
                </tr>



                <tr>
                    <th>কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যয়নরত কি না</th>
                    <th>অধ্যয়নরত ভাই/বোনের নাম</th>
                    <th>অধ্যয়নরত ভাই/বোনের শ্রেণি</th>
                    <th>অধ্যয়নরত ভাই/বোনের রোল</th>
                </tr>
                <tr>
                    <td>{{ form.bigBroSis }}</td>
                    <td>{{ form.bigBroSisName }}</td>
                    <td>{{ form.bigBroSisClass }}</td>
                    <td>{{ form.bigBroSisRoll }}</td>

                </tr>
                <tr>
                    <th>ঠিকানা</th>
                    <td colspan="3">বিভাগঃ- {{ form.division }}, জেলাঃ- {{ form.district }}, উপজেলাঃ- {{ form.upazila }}, ইউনিয়নঃ- {{ form.union }}, পোস্ট অফিসঃ- {{ form.post_office }}({{ form.AreaPostalCode }}), গ্রামঃ- {{ form.StudentAddress }}</td>
                </tr>


            </table>



        </div>

    </div>


          </tab>







        </div>
        <br/>
        <div class="field is-grouped">
            <div class="control" v-if="currentActive > 0">
                <button @click="previousTab()" class="button is-primary">আগের পৃষ্ঠা</button>
            </div>
            <div class="control" v-if="currentActive < totalTabs - 1">
                <button @click="nextTab()" class="button is-link">পরবর্তী পৃষ্ঠা</button>
            </div>
            <div class="control" v-if="currentActive == totalTabs -1" >
                <button @click="submit()" class="button is-success">জমা দিন</button>
            </div>
        </div>

    </div>
</template>

<script>
import Vue from 'vue';
import VeeValidate from 'vee-validate';
// import FormWizard from './form/FormWizard.vue';
import Tab from './form/Tab.vue';
// import 'bulma/css/bulma.css'

Vue.use(VeeValidate);

export default {
  name: 'app',

  components: {
     Tab
  },


  data(){
    return{
        tabs: [],

        currentActive: 0,
        studentEmailerror: '',
        studentEmailstatus:false,
        parentEmailerror: '',
        parentEmailstatus:false,
        totalTabs: 0,
        classes: [],
        preloader:false,
        form:{
            id:'',
            school_id:'',
            Year:new Date().getFullYear(),
            AdmissionID:'',
            StudentID:'',
            StudentRoll:'',
            StudentClass:'',
            StudentGender:'',
            StudentReligion:'',
            StudentName:'',
            StudentNameEn:'',
            StudentFatherNameBn:'',
            StudentFatherName:'',
            StudentMotherNameBn:'',
            StudentMotherName:'',
            StudentFatherNid:'',
            StudentMotherNid:'',
            StudentFatherBCN:'',
            StudentMotherBCN:'',

            fatherNidF:'',
            fatherNidB:'',
            motherNidF:'',
            motherNidB:'',




            guardNameBn:'',
            guardName:'',
            guardNid:'',
            guardRalation:'',
            StudentFatherOccupation:'',
            parentEarn:'',
            StudentMotherOccupation:'',
            ParentEmail:'',
            ParentPassword:'',
            StudentEmail:'',
            StudentPassword:'',
            StudentDateOfBirth:'',
            StudentBirthCertificateNo:'',
            StudentCategory:'',
            StudentKota:'',
            StudentKotaSonodNo:'',
            preSchool:'',
            preClass:'',
            bigBroSis:"No",
            bigBroSisName:'',
            bigBroSisClass:'',
            bigBroSisGroup:'Humanities',
            bigBroSisRoll:'',
            StudentGroup:'',
            StudentAddress:'',
            division:'',
            district:'',
            upazila:'',
            union:'',
            post_office:'',
            StudentPhoneNumber:'',
            AreaPostalCode:'',
            StudentStatus:'Pending',
            StudentTranferFrom:'',
            StudentPicture:'',
            StudentBirthC:'',
            JoiningDate:'',
            StudentTranferStatus:'',
            AplicationStatus:'',
            ThisMonthPaymentStatus:'',

        },

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

    created(){

        if(this.schoolSettings.application=='Off'){

            Notification.customError2('আবেদনের সময় শেষ হয়ে গেছে');
              this.$router.push({name: 'home'})
        }


        this.tabs = this.$children;


            this.form.school_id = this.school_id
            //  console.log(this.$router.history.current.query.step);



    },

    mounted(){
        this.totalTabs = this.tabs.length;

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

    },

  watch: {

        // 'form.StudentEmail'(value){

        //         axios.post(`/api/users/checks`,{'email':value})
        //             .then(({data}) => {
        //                 // console.log(data)
        //                 if(data.response.errors.email[0]==''){
        //                     this.studentEmailstatus = true
        //                 }else{
        //                     this.studentEmailstatus = false
        //                 }
        //                 this.studentEmailerror = data.response.errors.email[0]

        //             })
        //              .catch(error => {
        //                 console.log(error)
        //                 // this.errored = true
        //             })
        //         },

        // 'form.ParentEmail'(value){

        //         axios.post(`/api/users/checks`,{'email':value})
        //             .then(({data}) => {
        //                 // console.log(data)

        //                 if(data.response.errors.email[0]==''){

        //                     this.parentEmailerror = data.response.errors.email[0]

        //                     if(this.form.StudentEmail==this.form.ParentEmail){
        //                         this.parentEmailstatus = false
        //                         this.parentEmailerror = 'Student And Parent Email Must be defarent'

        //                     }else{

        //                         this.parentEmailstatus = true
        //                          this.parentEmailerror = ''
        //                     }

        //                     // this.parentEmailstatus = true



        //                 }else{
        //                     this.parentEmailstatus = false
        //                      this.parentEmailerror = data.response.errors.email[0]
        //                 }



        //             })
        //              .catch(error => {
        //                 console.log(error)
        //                 // this.errored = true
        //             })
        //         }




  },
    methods:{




        FileSelected($event, parent_index) {
            let file = $event.target.files[0];
            if (file.size > 5048576) {
                Notification.image_validation();
            } else {
                let reader = new FileReader;
                reader.onload = event => {
                var image = new Image();
                image.src = event.target.result;
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
        },



        FileSelected2($event, parent_index) {
            let file = $event.target.files[0];
                let reader = new FileReader;
                reader.onload = event => {
                var image = new Image();
                image.src = event.target.result;
                var formThis = this;
                    image.onload = function () {
                        var height = this.height;
                        var width = this.width;
                        //  console.log( width,height)
                        // if (height===width) {
                            formThis.form[parent_index] = event.target.result
                            return false;
                        // }

                        return true;
                    };
                };
                reader.readAsDataURL(file)

        },


        async checkStudent(){


                // this.form.bigBroSisGroup = 'Humanities';

                var res = await this.callApi('get',`/api/check/student/roll?StudentRoll=${this.form.bigBroSisRoll}&StudentClass=${this.form.bigBroSisClass}&StudentGroup=${this.form.bigBroSisGroup}&bigsis=1`,[]);
                // this.bissisBroDetails = res.data;
                this.form.bigBroSisName = res.data.StudentName


            },



        previousTab(){
            this.currentActive--;
            this.tabs.forEach(tab => {
                tab.isActive = false;
            });
                this.tabs[this.currentActive].isActive = true;

        },

        nextTab(){
            //Validate input




            if(!this.form.StudentBirthC){
                Notification.customError2('ছাত্র/ছাত্রীর জন্ম নিবন্ধন কপি is required!');
                this.preloader = false;
            }else if(!this.form.StudentPicture){
                Notification.customError2('Student image is required!');
                this.preloader = false;
            }else{

                this.$root.$validator.validate('step'+(this.currentActive+ 1)+'.*').then(valid => {
                    if(this.currentActive==0){
                        if (valid){
                            this.currentActive++;
                            this.tabs.forEach(tab => {
                                tab.isActive = false;
                            });
                            this.tabs[this.currentActive].isActive = true;
                        }
                    }else if(this.currentActive==1){

                            if (valid){
                                if(!this.form.fatherNidF){
                                    Notification.customError2('পিতার আইডি কার্ডের সামনের কপি is required!');
                                    this.preloader = false;
                                }else if(!this.form.fatherNidB){
                                    Notification.customError2('পিতার আইডি কার্ডের পিছনের কপি is required!');
                                    this.preloader = false;
                                }else if(!this.form.motherNidF){
                                    Notification.customError2('মাতার আইডি কার্ডের সামনের কপি is required!');
                                    this.preloader = false;
                                }else if(!this.form.motherNidB){
                                    Notification.customError2('মাতার আইডি কার্ডের পিছনের কপি is required!');
                                    this.preloader = false;
                                }else{
                                    this.currentActive++;
                                    this.tabs.forEach(tab => {
                                        tab.isActive = false;
                                    });
                                    this.tabs[this.currentActive].isActive = true;
                                }
                            }



                    }
                });
            }



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



      async submit() {

                      this.preloader = true;


                      if(this.form.StudentPicture){




                       var res = await this.callApi('post',`/api/students/form/submit`,this.form)
                    //    console.log(res.status)

                    if(res.data==444){
                        Notification.customError2('আবেদনের সময় শেষ হয়ে গেছে');
                        this.$router.push({name: 'home'})
                    }else{




                       if(res.status==201){
                            if(res.data){
                                Notification.success();
                                window.location.href=`/payment?studentId=${res.data.id}&type=Admission_fee`;

                            }else{
                                Notification.customError2('Something is wrong! please try again');
                            }

                       }else{
                        Notification.customError2('Something is wrong! please try again');
                       }

                    }


                        // window.location.href=`/payment?studentId=${res.data.id}&type=Admission_fee`;


                    }else{
                        Notification.customError2('Student image is required!');
                          this.preloader = false;
                    }



       }

        // submit(){

        //     this.$root.$validator.validate('step'+this.totalTabs+'.*').then(valid => {
        //         if (valid){
        //             alert("Everything passes ! Ready to Submit")
        //         }
        //     });
        // }
    }






}
</script>

<style lang="scss" >

@import "~bulma/bulma.sass";
@import "~bulma-steps-component/bulma-steps.sass";


[v-cloak] { display: none; }




::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #007bff8c !important;
}
::-moz-placeholder { /* Firefox 19+ */
  color: #007bff8c !important;
}
:-ms-input-placeholder { /* IE 10+ */
  color: #007bff8c !important;
}
:-moz-placeholder { /* Firefox 18- */
  color: #007bff8c !important;
}

.previewHead{
    font-size: 30px;
    font-weight: 500;
    border-bottom: 3px solid #00d1b2;
    line-height: 2;
    margin: 25px 0;
}
label.form_label {
    color: #007bff;
    font-weight: 600;
}


p.help.is-danger {
    font-size: 15px;
    font-family: sans-serif;
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




        .rootContainer {
            margin: 25px;
            border: 1px solid;
            padding: 5px 21px;
        }
        .tableTag, .tableTag td, .tableTag th {
        border: 1px solid;
        border-collapse: collapse;
        padding: 3px 7px;
        }
        td.tableRowHead {
    background: #d1d1d1;
}

td {
    height: 20px;
}

</style>
