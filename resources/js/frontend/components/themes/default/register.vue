<template>
  <div class="container my-5">
     <loader v-if="preloader==true" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="circular"></loader>

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


 <tab name="Student Details"  :selected="true">



 <div class="row">
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">ভর্তি আইডি</label>
                        <input class="form-control" type="text"  placeholder="Enter Admission ID" v-model="form.AdmissionID" name="AdmissionID" readonly v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.AdmissionID')">
                             {{ errors.first('step1.AdmissionID') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">শ্রেণি</label>


                            <select  class="form-control"  style="width: 100%;" v-model="form.StudentClass" name="StudentClass" @change="checkstudent"  v-validate="'required'" data-vv-scope="step1">
                                <option value="">
                                    SELECT
                                </option>
                                <option v-for="classlist in classess">{{ classlist }}</option>
                            </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentClass')">
                             {{ errors.first('step1.StudentClass') }}
                          </p>
                    </div>


                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">লিঙ্গ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGender" name="StudentGender" v-validate="'required'" data-vv-scope="step1">
                            <option value="">
                                লিঙ্গ নির্বাচন করুন
                            </option>
                            <option value="Male">
                                ছেলে
                            </option>
                            <option value="Female">
                                মেয়ে
                            </option>
                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentGender')">
                             {{ errors.first('step1.StudentGender') }}
                          </p>
                    </div>


                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">ধর্ম</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentReligion" name="StudentReligion" v-validate="'required'" data-vv-scope="step1">
                            <option value="">
                                ধর্ম নির্বাচন করুন
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
                         <p class="help is-danger" v-show="errors.has('step1.StudentReligion')">
                             {{ errors.first('step1.StudentReligion') }}
                          </p>
                    </div>


                </div>



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">নাম (বাংলা):</label>
                        <input class="form-control" type="text"  placeholder="Enter StudentName" v-model="form.StudentName" name="StudentName" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentName')">
                             {{ errors.first('step1.StudentName') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">নাম (English):</label>
                        <input class="form-control" type="text"  placeholder="Enter StudentName" v-model="form.StudentNameEn" name="StudentNameEn" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentNameEn')">
                             {{ errors.first('step1.StudentNameEn') }}
                          </p>
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
                        <label class="form_label">জন্ম তারিখ</label>
                        <input class="form-control" type="date"  placeholder="Enter Student Date Of Birth" v-model="form.StudentDateOfBirth" name="StudentDateOfBirth" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentDateOfBirth')">
                             {{ errors.first('step1.StudentDateOfBirth') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Birth Certificate No" v-model="form.StudentBirthCertificateNo" name="StudentBirthCertificateNo" maxlength="17" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentBirthCertificateNo')">
                             {{ errors.first('step1.StudentBirthCertificateNo') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">Student category:</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentCategory" name="StudentCategory" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">Select Student category</option>
                            <option>কর্মজীবী শিক্ষার্থী</option>
                            <option>ভূমিহীন অভিভাবকের সন্তান</option>
                            <option>মুক্তিযোদ্ধা পোষা/নাতি-নাতনি</option>
                            <option>ক্ষুদ্র নৃ-গোষ্ঠী শিক্ষার্থী</option>
                            <option>বিশেষ চাহিদা সম্পন্ন শিক্ষার্থী</option>
                            <option>অনাথ/এতিম শিক্ষা</option>
                            <option>অন্যান্য</option>
                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentCategory')">
                             {{ errors.first('step1.StudentCategory') }}
                          </p>
                    </div>
                    </div>


                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">কোটা</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentKota" name="StudentKota" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">
                                কোটা নির্বাচন করুন
                            </option>
                            <option>মুক্তিযোদ্ধার সন্তান, নাতী নাতনী</option>
                            <option>অত্র বিদ্যালয়ে কর্মরত শিক্ষক, কর্মচারী ও ম্যানেজিং কমিটির সন্তান</option>
                            <option>প্রতিবন্ধী</option>
                            <option>সাধারণ কোটা</option>
                            <option>কোন কোটা নেই</option>
                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.StudentKota')">
                             {{ errors.first('step1.StudentKota') }}
                          </p>
                    </div>
                    </div>



                <div class="col-md-4 mt-3"  >
                    <div class="form-group">
                        <label class="form_label">কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যায়নরত কি না</label>
                        <select class="form-control" style="width: 100%;" v-model="form.bigBroSis" name="bigBroSis" v-validate="'required'" data-vv-scope="step1" >
                            <option value="No">না</option>
                            <option value="Yes">হ্যাঁ</option>

                        </select>
                         <p class="help is-danger" v-show="errors.has('step1.bigBroSis')">
                             {{ errors.first('step1.bigBroSis') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4 mt-3" v-if="form.bigBroSis=='Yes'" >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের নাম</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Birth Certificate No" v-model="form.bigBroSisName" name="bigBroSisName" v-validate="'required'"   data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.bigBroSisName')">
                             {{ errors.first('step1.bigBroSisName') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4 mt-3"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের শ্রেণি</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Birth Certificate No" v-model="form.bigBroSisClass" name="bigBroSisClass" v-validate="'required'"   data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.bigBroSisClass')">
                             {{ errors.first('step1.bigBroSisClass') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4 mt-3"  v-if="form.bigBroSis=='Yes'"  >
                    <div class="form-group">
                        <label class="form_label">অধ্যয়নরত ভাই/বোনের রোল</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Birth Certificate No" v-model="form.bigBroSisRoll" name="bigBroSisRoll" v-validate="'required'"   data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.bigBroSisRoll')">
                             {{ errors.first('step1.bigBroSisRoll') }}
                          </p>
                    </div>
                </div>






                <div class="col-md-4 mt-3" v-if="form.StudentClass=='Nine' || form.StudentClass=='Ten'" id="Sgroup" >
                    <div class="form-group">
                        <label class="form_label">গ্রুপ</label>
                        <select class="form-control" style="width: 100%;" v-model="form.StudentGroup" name="StudentGroup" v-validate="'required'" data-vv-scope="step1" >
                            <option value="">
                                গ্রুপ নির্বাচন করুন
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
                         <p class="help is-danger" v-show="errors.has('step1.StudentGroup')">
                             {{ errors.first('step1.StudentGroup') }}
                          </p>
                    </div>







                </div>

                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">ঠিকানা</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Address" v-model="form.StudentAddress" name="StudentAddress" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentAddress')">
                             {{ errors.first('step1.StudentAddress') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">মোবাইল নাম্বার</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Phone Number" v-model="form.StudentPhoneNumber" name="StudentPhoneNumber" maxlength="11" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.StudentPhoneNumber')">
                             {{ errors.first('step1.StudentPhoneNumber') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="form-group">
                        <label class="form_label">পোস্টাল কোড</label>
                        <input class="form-control" type="text"  placeholder="Enter Area Postal Code" v-model="form.AreaPostalCode" name="AreaPostalCode" v-validate="'required'" data-vv-scope="step1" />
                         <p class="help is-danger" v-show="errors.has('step1.AreaPostalCode')">
                             {{ errors.first('step1.AreaPostalCode') }}
                          </p>
                    </div>
                </div>



                </div>











          </tab>
          <tab name="Parent Details" data-vv-scope="step2">
           <div class="row">





                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Name" v-model="form.StudentFatherNameBn" name="StudentFatherNameBn"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentFatherNameBn')">
                             {{ errors.first('step2.StudentFatherNameBn') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Name" v-model="form.StudentFatherName" name="StudentFatherName"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentFatherName')">
                             {{ errors.first('step2.StudentFatherName') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (বাংলা)</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Name" v-model="form.StudentMotherNameBn" name="StudentMotherNameBn"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentMotherNameBn')">
                             {{ errors.first('step2.StudentMotherNameBn') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার নাম (English)</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Name" v-model="form.StudentMotherName" name="StudentMotherName"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentMotherName')">
                             {{ errors.first('step2.StudentMotherName') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Name" v-model="form.StudentFatherNid" name="StudentFatherNid"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentFatherNid')">
                             {{ errors.first('step2.StudentFatherNid') }}
                          </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জাতীয় পরিচয় পত্র নং</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Name" v-model="form.StudentMotherNid" name="StudentMotherNid"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.StudentMotherNid')">
                             {{ errors.first('step2.StudentMotherNid') }}
                          </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">পিতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Father Name" v-model="form.StudentFatherBCN" name="Father-Birth-Certificate-No"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.Father-Birth-Certificate-No')">
                             {{ errors.first('step2.Father-Birth-Certificate-No') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">মাতার জন্ম নিবন্ধন নং</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Name" v-model="form.StudentMotherBCN" name="Mother-Birth-Certificate-No"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.Mother-Birth-Certificate-No')">
                             {{ errors.first('step2.Mother-Birth-Certificate-No') }}
                          </p>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের মাসিক আয়</label>
                        <input class="form-control" type="text"  placeholder="Enter Student Mother Name" v-model="form.parentEarn" name="parentEarn"  v-validate="'required'" data-vv-scope="step2" />
                         <p class="help is-danger" v-show="errors.has('step2.parentEarn')">
                             {{ errors.first('step2.parentEarn') }}
                          </p>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form_label">অভিভাবকের পেশা</label>


                        <select class="form-control" style="width: 100%;" v-model="form.StudentFatherOccupation" name="StudentFatherOccupation" v-validate="'required'" data-vv-scope="step2" >
                            <option value="">
                                অভিভাবকের পেশা নির্বাচন করুন
                            </option>
                            <option>ব্যবসায়ি</option>
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

                         <p class="help is-danger" v-show="errors.has('step2.StudentFatherOccupation')">
                             {{ errors.first('step2.StudentFatherOccupation') }}
                          </p>
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
          <tab name="Preview" info="Finishing Up" >
                <div class="row">

                    <div class="col-md-12"><h2 class="previewHead">ছাত্র/ছাত্রীর তথ্য</h2></div>
                    <div class="col-md-6"><b>ভর্তি আইডি : </b>{{ this.form.AdmissionID }}</div>
                    <div class="col-md-6"><b>শ্রেণি : </b>{{ this.form.StudentClass }}</div>
                    <div class="col-md-6"><b>লিঙ্গ : </b>{{ this.form.StudentGender }}</div>
                    <div class="col-md-6"><b>ধর্ম : </b>{{ this.form.StudentReligion }}</div>
                    <div class="col-md-6"><b>নাম (বাংলা) : </b>{{ this.form.StudentName }}</div>
                    <div class="col-md-6"><b>নাম (English) : </b>{{ this.form.StudentNameEn }}</div>

                    <div class="col-md-6"><b>জন্ম তারিখ : </b>{{ this.form.StudentDateOfBirth }}</div>
                    <div class="col-md-6"><b>জন্ম নিবন্ধন নং : </b>{{ this.form.StudentBirthCertificateNo }}</div>
                    <div class="col-md-6"><b>Student category : </b>{{ this.form.StudentCategory }}</div>
                    <div class="col-md-6"><b>কোটা : </b>{{ this.form.StudentKota }}</div>
                    <div class="col-md-6"><b>কোন ভাই/বোন অত্র প্রতিষ্ঠানে অধ্যায়নরত কি না : </b>{{ this.form.bigBroSis }}</div>
                    <div class="col-md-6"><b>অধ্যয়নরত ভাই/বোনের নাম : </b>{{ this.form.bigBroSisName }}</div>
                    <div class="col-md-6"><b>অধ্যয়নরত ভাই/বোনের শ্রেণি : </b>{{ this.form.bigBroSisClass }}</div>
                    <div class="col-md-6"><b>অধ্যয়নরত ভাই/বোনের রোল : </b>{{ this.form.bigBroSisRoll }}</div>
                    <div class="col-md-6"><b>গ্রুপ : </b>{{ this.form.StudentGroup }}</div>
                    <div class="col-md-6"><b>ঠিকানা : </b>{{ this.form.StudentAddress }}</div>
                    <div class="col-md-6"><b>মোবাইল নাম্বার : </b>{{ this.form.StudentPhoneNumber }}</div>
                    <div class="col-md-6"><b>পোস্টাল কোড : </b>{{ this.form.AreaPostalCode }}</div>

                    <div class="col-md-12"><h2 class="previewHead">অভিভাবকের তথ্য</h2></div>

                    <div class="col-md-6"><b>পিতার নাম (বাংলা) : </b>{{ this.form.StudentFatherNameBn }}</div>
                    <div class="col-md-6"><b>পিতার নাম (English) : </b>{{ this.form.StudentFatherName }}</div>
                    <div class="col-md-6"><b>মাতার নাম (বাংলা) : </b>{{ this.form.StudentMotherNameBn }}</div>
                    <div class="col-md-6"><b>মাতার নাম (English) : </b>{{ this.form.StudentMotherName }}</div>
                    <div class="col-md-6"><b>পিতার জাতীয় পরিচয় পত্র নং : </b>{{ this.form.StudentFatherNid }}</div>
                    <div class="col-md-6"><b>মাতার জাতীয় পরিচয় পত্র নং : </b>{{ this.form.StudentMotherNid }}</div>
                    <div class="col-md-6"><b>পিতার জন্ম নিবন্ধন নং : </b>{{ this.form.StudentFatherBCN }}</div>
                    <div class="col-md-6"><b>মাতার জন্ম নিবন্ধন নং : </b>{{ this.form.StudentMotherBCN }}</div>
                    <div class="col-md-6"><b>অভিভাবকের মাসিক আয় : </b>{{ this.form.parentEarn }}</div>
                    <div class="col-md-6"><b>অভিভাবকের পেশা : </b>{{ this.form.StudentFatherOccupation }}</div>



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
            StudentFatherOccupation:null,
            parentEarn:null,
            StudentMotherOccupation:null,
            ParentEmail:null,
            ParentPassword:null,
            StudentEmail:null,
            StudentPassword:null,
            StudentDateOfBirth:null,
            StudentBirthCertificateNo:null,
            StudentCategory:null,
            StudentKota:null,
            bigBroSis:"No",
            bigBroSisName:null,
            bigBroSisClass:null,
            bigBroSisRoll:null,
            StudentGroup:null,
            StudentAddress:null,
            StudentPhoneNumber:null,
            AreaPostalCode:null,
            StudentStatus:'Pending',
            StudentTranferFrom:null,
            StudentPicture:null,
            JoiningDate:null,
            StudentTranferStatus:null,
            AplicationStatus:null,
            ThisMonthPaymentStatus:null,

        }



    }
   },

    created(){
        this.tabs = this.$children;


            this.form.school_id = this.school_id
            //  console.log(this.$router.history.current.query.step);



    },

    mounted(){
        this.totalTabs = this.tabs.length;

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


            checkstudent(){

if(this.form.StudentClass!='Nine' || this.form.StudentClass!='Ten') this.form.StudentGroup=''


		axios.get(`/api/student/admissionid/genarate?school_id=${this.form.school_id}`)
			.then(({data}) => {
                this.form.AdmissionID = data;

            })
			.catch()
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
            this.$root.$validator.validate('step'+(this.currentActive+ 1)+'.*').then(valid => {

                // console.log(valid)


    if(this.currentActive==0){
                // if (valid && this.studentEmailstatus){
                if (valid){
                    this.currentActive++;
                    this.tabs.forEach(tab => {
                        tab.isActive = false;
                    });

                    this.tabs[this.currentActive].isActive = true;
                }
         }else if(this.currentActive==1){
                // if (valid && this.parentEmailstatus){
                if (valid){
                    this.currentActive++;
                    this.tabs.forEach(tab => {
                        tab.isActive = false;
                    });

                    this.tabs[this.currentActive].isActive = true;
                }
    }






            });





        },







      async submit() {

                      this.preloader = true;
                       var res = await this.callApi('post',`/api/students/form/submit`,this.form)
                    //    console.log(res.data)
                        window.location.href=`/payment?amount=10&studentId=${res.data.id}`;
                        Notification.success();
                        // this.preloader = false;

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
.form-control {
    border: 1px solid #022c32 !important;
    color: #007BFF !important;
    font-family: sans-serif;
}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #007bff !important;
    outline: 0;
    box-shadow: 0 0 0 black !important;
}

p.help.is-danger {
    font-size: 15px;
    font-family: sans-serif;
}

</style>
