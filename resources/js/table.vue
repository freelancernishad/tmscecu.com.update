<template>
    <div>
        <!-- User Interface controls -->
          <loader v-if="preLooding" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40"
            objectbg="#999793" opacity="80" name="circular"></loader>
        <b-row>
            <b-col lg="6" class="my-1" v-if="SortOptionsStaus">
                <b-form-group label="Sort" label-for="sort-by-select" label-cols-sm="3" label-align-sm="right"
                    label-size="sm" class="mb-0" v-slot="{ ariaDescribedby }">
                    <b-input-group size="sm">
                        <b-form-select id="sort-by-select" v-model="sortBy" :options="sortOptions"
                            :aria-describedby="ariaDescribedby" class="w-75">
                            <template #first>
                                <option value="">-- none --</option>
                            </template>
                        </b-form-select>
                        <b-form-select v-model="sortDesc" :disabled="!sortBy" :aria-describedby="ariaDescribedby"
                            size="sm" class="w-25">
                            <option :value="false">Asc</option>
                            <option :value="true">Desc</option>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
            </b-col>
            <b-col lg="6" class="my-1" v-if="SortOptionsStaus">
                <b-form-group label="Initial sort" label-for="initial-sort-select" label-cols-sm="3"
                    label-align-sm="right" label-size="sm" class="mb-0">
                    <b-form-select id="initial-sort-select" v-model="sortDirection" :options="['asc', 'desc', 'last']"
                        size="sm"></b-form-select>
                </b-form-group>
            </b-col>
            <b-col lg="6" class="my-1" v-if="Filter">
                <b-form-group label="Filter" label-for="filter-input" label-cols-sm="3" label-align-sm="right"
                    class="mb-0">
                    <b-input-group>
                        <b-form-input id="filter-input" v-model="filter" type="search" placeholder="Type to Search">
                        </b-form-input>
                        <b-input-group-append>
                            <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                        </b-input-group-append>
                    </b-input-group>
                </b-form-group>
            </b-col>
            <b-col lg="6" class="my-1" v-if="AllUpdate != ''">
                <form class="d-flex" style="justify-content: space-evenly;" @submit.stop.prevent="onSubmit">
                    <div class="form-group m-0" style="width:48%">
                        <select class="form-control" v-model="f.paymentType" required>
                            <option value="">Select</option>
                            <option value="Postpaid">Postpaid</option>
                            <option value="Prepaid">Prepaid</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info" style="width:48%">Update all</button>

                </form>
            </b-col>
            <b-col lg="6" class="my-1 text-right" v-if="AddNew != ''">

                <router-link :to="{ name: AddNew }" class="btn btn-info">Add New</router-link>
            </b-col>
            <b-col lg="6" class="my-1" v-if="FilterOn">
                <b-form-group v-model="sortDirection" label="Filter On"
                    description="Leave all unchecked to filter on all data" label-cols-sm="3" label-align-sm="right"
                    label-size="sm" class="mb-0" v-slot="{ ariaDescribedby }">
                    <b-form-checkbox-group v-model="filterOn" :aria-describedby="ariaDescribedby" class="mt-1">
                        <b-form-checkbox value="name">Name</b-form-checkbox>
                        <b-form-checkbox value="age">Age</b-form-checkbox>
                        <b-form-checkbox value="isActive">Active</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-col>
            <b-col sm="5" md="6" class="my-1" v-if="PerPage">
                <b-form-group label="Per page" label-for="per-page-select" label-cols-sm="6" label-cols-md="4"
                    label-cols-lg="3" label-align-sm="right" label-size="sm" class="mb-0">
                    <b-form-select id="per-page-select" v-model="perPage" :options="pageOptions" size="sm">
                    </b-form-select>
                </b-form-group>
            </b-col>
        </b-row>
        <!-- <input type="checkbox" id="checkboxid" v-model="selectall" @change="selectAllFun"> <label for="checkboxid">Select All</label> -->
        <div class="form-check" v-if="SelectOption">
            <input type="checkbox" id="checkboxid" v-model="selectall" @change="selectAllFun" class="form-check-input">
            <label for="checkboxid" class="form-check-label">Select All</label>
        </div>



        <!-- Main table element -->
        <b-table :items="Items" :fields="Fields" :current-page="currentPage" :per-page="PerPageData" :filter="filter"
            :filter-included-fields="filterOn" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc"
            :sort-direction="sortDirection" stacked="md" show-empty small @filtered="onFiltered">
            <template #cell(id)="row">
                <div class="form-check">
                    <input type="checkbox" :value="row.item.id" v-model="select" class="form-check-input">
                    <label class="form-check-label customcheckbox"></label>
                </div>
            </template>
            <template #cell(status)="row">
                <span size="sm" class="btn btn-success mr-1 mt-1" v-if="row.item.payment_status == 'Paid'">
                    {{ row.item.payment_status }}
                </span>
                <span size="sm" class="btn btn-danger mr-1 mt-1" v-else-if="row.item.payment_status == 'Unpaid'">
                    {{ row.item.payment_status }}
                </span>
            </template>
            <template #cell(actions)="row">
                <span size="sm" @click="deletefun(row.item, row.index, $event.target)" v-if="DeleteRoute != ''"
                    class="btn btn-danger mr-1 mt-1">
                    Delete
                </span>
                <a size="sm" target="_blank" :href="ApplicationRoute + '/' + row.item.sonod_name + '/' + row.item.id"
                    v-if="ApplicationRoute != ''" class="btn btn-success mr-1 mt-1">
                    আবেদন পত্র
                </a>
                <router-link size="sm" :to="{ name: EditRoute, params: { id: row.item.id } }" v-if="EditRoute != ''"
                    class="btn btn-info mr-1 mt-1">
                    Edit
                </router-link>
                <span size="sm" @click="info(row.item, row.index, $event.target)" v-if="ViewRoute != ''"
                    class="btn btn-info mr-1 mt-1">
                    View
                </span>
                <!-- <router-link size="sm" :to="{name:ViewRoute,params:{id:row.item.id}}" @click="info(ApproveRoute,row.item.id,ApproveData, $event.target)"  v-if="ViewRoute!=''" class="btn btn-success mr-1">
                    View
                </router-link> -->
                <span size="sm" @click="approve(ApproveRoute, row.item.id, ApproveData, $event.target, ApproveType,row.item)"
                    v-if="ApproveRoute != '' && row.item.payment_status == 'Unpaid'" class="btn btn-success mr-1 mt-1">
                    Approve
                </span>
                <span size="sm" @click="approve('/api/sonod', row.item.id, ApproveData, $event.target, 'apiAction',row.item)"
                    v-else-if="ApproveRoute != '' && row.item.payment_status == 'Paid'"
                    class="btn btn-success mr-1 mt-1">
                    Approve
                </span>
                <span size="sm" @click="paynow(PayRoute, row.item.id, $event.target)"
                    v-if="row.item.payment_status == 'Unpaid' && row.item.stutus == 'approved' && PayRoute != ''"
                    class="btn btn-info mr-1 mt-1">
                    Pay Now
                </span>
                <a :href="'/invoice/d/' + row.item.id" target="_blank" size="sm" v-if="row.item.stutus == 'approved'"
                    class="btn btn-info mr-1 mt-1">
                    রশিদ
                </a>
                <a :href="'/sonod/d/' + row.item.id" target="_blank" size="sm"
                    v-if="row.item.stutus == 'approved' && row.item.payment_status == 'Paid'"
                    class="btn btn-info mr-1 mt-1">
                    সনদ
                </a>
                <!--
                <router-link size="sm" :to="{name:ApproveRoute,params:{id:row.item.id}}"  v-if="ApproveRoute!='' && ApproveType=='vueAction'" class="btn btn-success mr-1">
                    Approve
                </router-link> -->
                <span size="sm" @click="cancel(CancelRoute, row.item.id, 'cancel', $event.target)"
                    v-if="CancelRoute != ''" class="btn btn-danger mr-1 mt-1">
                    Not-Approve
                </span>
            </template>
            <template #row-details="row">
                <b-card>
                    <ul>
                        <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
                    </ul>
                </b-card>
            </template>
        </b-table>
        <b-pagination v-model="currentPage" :total-rows="TotalRows" :per-page="PerPageData" first-text="First"
            prev-text="Prev" next-text="Next" last-text="Last" align="right"></b-pagination>
        <!-- Info modal -->
        <b-modal :id="infoModal.id" size="xl" :title="infoModal.title" ok-only @hide="resetInfoModal">

            <div v-if="infoModal.title == 'Cancel'">
                <form v-on:submit.prevent="formcancel">
                    <div class="form-group">
                        <label for="">বাতিল এর কারন উল্লেখ করুন</label>
                        <textarea class="form-control" v-model="b.reson" cols="30" rows="10"
                            style="height:100px;resize:none"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Not Approve</button>
                </form>

            </div>
            <div v-else>
                <approvetrade :approve-data="ApproveData" :sonod-id="infoModal.content_id" :Details="infoModal.content" @event-name="sonodList"
                    v-if="SonodType == 'Trade_license'"></approvetrade>
                <approvesonod :approve-data="ApproveData" :sonod-id="infoModal.content_id" :Details="infoModal.content" @event-name="sonodList"
                    v-else>
                </approvesonod>
            </div>

            <!-- <pre>{{ infoModal.content_id }}</pre> -->
        </b-modal>

        <!-- Info modal -->
        <b-modal :id="prottoyonModal.id" size="xl" :title="prottoyonModal.title" ok-only @hide="resetInfoModal">

            <div v-if="prottoyonModal.title == 'Cancel'">
                <form v-on:submit.prevent="formcancel">
                    <div class="form-group">
                        <label for="">বাতিল এর কারন উল্লেখ করুন</label>
                        <textarea class="form-control" v-model="b.reson" cols="30" rows="10"
                            style="height:100px;resize:none"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Not Approve</button>
                </form>

            </div>
            <div v-else>
                <approveprottoyon :approve-data="ApproveData" :sonod-id="prottoyonModal.content_id" @event-name="sonodList"></approveprottoyon>

            </div>

            <!-- <pre>{{ infoModal.content_id }}</pre> -->
        </b-modal>
        <!-- Info modal -->
        <b-modal :id="viewModal.id" size="xl" :title="viewModal.title" ok-only @hide="resetInfoModal">
            <div class="row">
                <div class="col-md-12">
                    <div class="app-heading">আবেদনকারীর তথ্য</div>
                </div>
                <div class="col-md-4 mt-3"></div>
                <div class="col-md-4 mt-3"><img width="100%" :src="$asseturl + viewModal.content.image" alt=""></div>
                <div class="col-md-4 mt-3"></div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর নাম : </b>{{ viewModal.content.applicant_name }}</div>

                <div class="col-md-4 col-6 mt-3" v-if="SonodName.enname == 'Certification of the same name'"><b>আবেদনকারীর দ্বিতীয় নাম : </b>{{ viewModal.content.applicant_second_name }}</div>

                <div class="col-md-4 col-6 mt-3"><b>লিঙ্গ : </b>{{ viewModal.content.applicant_gender }}</div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর পিতা/স্বামীর নাম : </b>{{
                        viewModal.content.applicant_father_name
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর পিতা জীবিত কিনা : </b>{{
                        viewModal.content.successor_father_alive_status
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর মাতার নাম : </b>{{
                        viewModal.content.applicant_mother_name
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>আবেদনকারীর মাতা জীবিত কিনা : </b>{{
                        viewModal.content.successor_mother_alive_status
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>ন্যাশনাল আইডি : </b>{{
                        viewModal.content.applicant_national_id_number
                }}

                    <span v-if="nidverify" class="badge badge-pill badge-success mg-t-8">Verified</span>
                    <span v-else class="badge badge-pill badge-danger mg-t-8">Unverified</span>

                </div>
                <div class="col-md-4 col-6 mt-3"><b>জন্ম নিবন্ধন নং : </b>{{
                        viewModal.content.applicant_birth_certificate_number
                }}

                    <span v-if="dobverify" class="badge badge-pill badge-success mg-t-8">Verified</span>
                    <span v-else class="badge badge-pill badge-danger mg-t-8">Unverified</span>

                </div>
                <div class="col-md-4 col-6 mt-3"><b>হোল্ডিং নং : </b>{{ viewModal.content.applicant_holding_tax_number
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>জম্ম তারিখ : </b>{{ viewModal.content.applicant_date_of_birth }}
                </div>




                <div class="col-md-4 col-6 mt-3" v-if="SonodName.enname == 'Family certificate'"><b>বংশের নাম : </b>{{ viewModal.content.family_name }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="SonodName.enname == 'Certificate of annual income' || SonodName.enname == 'Parents Income Certificate'"><b>বার্ষিক আয় : </b>{{ viewModal.content.Annual_income }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="SonodName.enname == 'permit'"><b>অনুমতি এর বিষয় : </b>{{ viewModal.content.Subject_to_permission }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="SonodName.bnname=='প্রতিবন্ধী সনদপত্র'"><b>প্রতিবন্ধী : </b>{{ viewModal.content.disabled }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="SonodName.enname == 'No Objection Letter to Transfer of Constituency'"><b>স্থানান্তরিত এলাকার নাম : </b>{{ viewModal.content.Name_of_the_transferred_area }}</div>
                <div class="col-md-4 col-6 mt-3" v-if="SonodName.enname == 'Certificate'"><b>প্রত্যয়নপত্র এর বিষয় : </b>{{ viewModal.content.The_subject_of_the_certificate }}</div>




                <div class="col-md-4 col-6 mt-3"><b>বয়স: </b>{{ age(viewModal.content.applicant_date_of_birth) }}</div>
                <div class="col-md-4 col-6 mt-3"><b>পাসপোর্ট নং : </b>{{ viewModal.content.applicant_passport_number }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>বৈবাহিক সম্পর্ক : </b>{{ viewModal.content.applicant_marriage_status
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>পেশা: </b>{{ viewModal.content.applicant_occupation }}</div>
                <div class="col-md-4 col-6 mt-3"><b>শিক্ষাগত যোগ্যতা: </b>{{ viewModal.content.applicant_education }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>ধর্ম: </b>{{ viewModal.content.applicant_religion }}</div>
                <div class="col-md-4 col-6 mt-3"><b>বাসিন্দা: </b>{{ viewModal.content.applicant_resident_status }}
                </div>

                <div class="col-md-12 col-12 mt-3" v-if="viewModal.content.sonod_name!='ট্রেড লাইসেন্স'"><b>আবেদনকৃত প্রত্যয়নের বিবরণ: <br> </b>{{ viewModal.content.prottoyon }}</div>

                <div class="col-md-12 col-12 mt-3" v-if="viewModal.content.stutus=='Secretary_approved' || viewModal.content.stutus=='approved'"><b>প্রত্যয়ন প্রদানের বিবরণ: <br> </b>
 <span v-html="viewModal.content.sec_prottoyon"></span>
    <!-- <div class="form-group">
              <textarea v-model="prottoyon.sec_prottoyon=viewModal.content.sec_prottoyon" class="form-control" style="height:100px;resize:none"></textarea>
</div>

                <button class="btn btn-success" @click="sec_prottoyonUpdate(viewModal.content.id)">Update</button>
                 -->
</div>

                <div class="col-md-12">
                    <div class="app-heading">বর্তমান ঠিকানা</div>
                </div>
                <div class="col-md-4 col-6 mt-3"><b>গ্রাম/মহল্লা: </b>{{ viewModal.content.applicant_present_village }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>রোড/ব্লক/সেক্টর: </b>{{
                        viewModal.content.applicant_present_road_block_sector
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>ওয়ার্ড নং: </b>{{ viewModal.content.applicant_present_word_number }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>জেলা: </b>{{ viewModal.content.applicant_present_district }}</div>
                <div class="col-md-4 col-6 mt-3"><b>উপজেলা/থানা: </b>{{ viewModal.content.applicant_present_Upazila }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>পোষ্ট অফিস: </b>{{ viewModal.content.applicant_present_post_office
                }}</div>
                <div class="col-md-12">
                    <div class="app-heading">স্থায়ী ঠিকানা</div>
                </div>
                <div class="col-md-4 col-6 mt-3"><b>গ্রাম/মহল্লা: </b>{{ viewModal.content.applicant_permanent_village
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>রোড/ব্লক/সেক্টর: </b>{{
                        viewModal.content.applicant_permanent_road_block_sector
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>ওয়ার্ড নং: </b>{{ viewModal.content.applicant_permanent_word_number
                }}</div>
                <div class="col-md-4 col-6 mt-3"><b>জেলা: </b>{{ viewModal.content.applicant_permanent_district }}</div>
                <div class="col-md-4 col-6 mt-3"><b>উপজেলা/থানা: </b>{{ viewModal.content.applicant_permanent_Upazila }}
                </div>
                <div class="col-md-4 col-6 mt-3"><b>পোষ্ট অফিস: </b>{{ viewModal.content.applicant_permanent_post_office
                }}</div>
                <div class="col-md-12">
                    <div class="app-heading">যোগাযোগের ঠিকানা</div>
                </div>
                <div class="col-md-6 col-6 mt-3"><b>মোবাইল: </b>{{ viewModal.content.applicant_mobile }}</div>
                <div class="col-md-6 col-6 mt-3"><b>ইমেল: </b>{{ viewModal.content.applicant_email }}</div>
                <div class="col-md-12">
                    <div class="app-heading">Attachment</div>
                </div>
                <div class="col-md-4 col-6 mt-3"><span>ন্যাশনাল আইডি (Front page)</span> <br> <img width="100%"
                        :src="$asseturl + viewModal.content.applicant_national_id_front_attachment" alt=""></div>
                <div class="col-md-4 col-6 mt-3"><span>ন্যাশনাল আইডি (Back page)</span> <br> <img width="100%"
                        :src="$asseturl + viewModal.content.applicant_national_id_back_attachment" alt=""></div>
                <div class="col-md-4 col-6 mt-3"><span>জন্ম নিবন্ধন</span> <br> <img width="100%"
                        :src="$asseturl + viewModal.content.applicant_birth_certificate_attachment" alt=""></div>


  <div class="col-md-12" v-if="viewModal.content.sonod_name=='ওয়ারিশান সনদ' || viewModal.content.sonod_name=='উত্তরাধিকারী সনদ'">

                    <div class="app-heading" v-if="viewModal.content.sonod_name=='ওয়ারিশান সনদ'">ওয়ারিশগনের তালিকা </div>
                    <div class="app-heading" v-else-if="viewModal.content.sonod_name=='উত্তরাধিকারী সনদ'">উত্তরাধিকারীগনের তালিকা </div>

                </div>

                <table class="table" v-if="viewModal.content.sonod_name=='ওয়ারিশান সনদ' || viewModal.content.sonod_name=='উত্তরাধিকারী সনদ'">
                    <tr>
                        <th>ক্রমিক</th>
                        <th>নাম</th>
                        <th>সম্পর্ক</th>
                        <th>জন্ম তারিখ</th>
                        <th>জাতীয় পরিচয়পত্র নাম্বার</th>
                    </tr>
                    <tr v-for="(ut,index) in JSON.parse(viewModal.content.successor_list)" :key="'ut'+index">
                        <td>{{ ut.w_id }}</td>
                        <td>{{ ut.w_name }}</td>
                        <td>{{ ut.w_relation }}</td>
                        <td>{{ ut.w_age }}</td>
                        <td>{{ ut.w_nid }}</td>
                    </tr>
                </table>



            </div>
        </b-modal>
    </div>
</template>
<script>
export default {
    props: {
        SonodType: {
            type: String,
            default: ''
        },
        AllUpdate: {
            type: String,
            default: ''
        },
        AddNew: {
            type: String,
            default: ''
        },
        SortOptionsStaus: {
            type: Boolean,
            default: false
        },
        Filter: {
            type: Boolean,
            default: false
        },
        FilterOn: {
            type: Boolean,
            default: false
        },
        PerPage: {
            type: Boolean,
            default: false
        },
        SelectOption: {
            type: Boolean,
            default: false
        },
        Items: {
            type: Array,
            default: [],
        },
        Fields: {
            type: Array,
            default: [],
        },
        PerPageData: {
            type: String,
            default: 10,
        },
        TotalRows: {
            type: String,
            default: 1,
        },
        DeleteRoute: {
            type: String,
            default: '',
        },
        EditRoute: {
            type: String,
            default: '',
        },
        ViewRoute: {
            type: String,
            default: '',
        },
        ApplicationRoute: {
            type: String,
            default: '',
        },
        ApproveRoute: {
            type: String,
            default: '',
        },
        PayRoute: {
            type: String,
            default: '',
        },
        ApproveData: {
            type: String,
            default: 'approved',
        },
        ApproveType: {
            type: String,
            default: 'apiAction',
        },
        CancelRoute: {
            type: String,
            default: '',
        },
        ApproveComponent: {
            type: String,
            default: '',
        }
    },
    data() {
        return {
            // totalRows: 1,
            prottoyon:{

                sec_prottoyon: null,
            },
            currentPage: 1,
            perPage: 5,
            // pageOptions: [5, 10, 15, { value: 100, text: "Show a lot" }],
            sortBy: '',
            sortDesc: false,
            preLooding: false,
            sortDirection: 'asc',
            filter: null,
            filterOn: [],
            select: [],
            selectall: false,
            nidverify: false,
            dobverify: false,
            f: {
                paymentType: '',
                district: '',
            },
            b: {
                reson: '',
            },
            infoModal: {
                id: 'info-modal',
                title: '',
                content: {},
                content_id: '',
            },
            prottoyonModal: {
                id: 'prottoyon-modal',
                title: '',
                content: {},
                content_id: '',
            },
            viewModal: {
                id: 'view-modal',
                title: '',
                content: {},
                content_id: '',
            }
        }
    },
    computed: {
        sortOptions() {
            // Create an options list from our fields
            return this.Fields
                .filter(f => f.sortable)
                .map(f => {
                    return { text: f.label, value: f.key }
                })
        }
    },
    mounted() {
        // Set the initial number of items
        // this.totalRows = this.Items.length
    },
    methods: {

       async sec_prottoyonUpdate(id){


            var res = await this.callApi('post', `/api/prottoyon/update/${id}`, this.prottoyon)
             Notification.customSuccess(`প্রত্যয়ন প্রদানের বিবরণ Updated`);
        },




        selectAllFun() {
            this.select = [];
            if (this.selectall) {
                this.Items.forEach((element, key) => {
                    this.select[key] = element.id
                });
            } else {
                this.select = [];
            }
        },
        age(dateOf = '2001-08-25') {
            var dateofbirth = dateOf.split("-");
            var y1 = dateofbirth[0];
            var m1 = dateofbirth[1];
            var d1 = dateofbirth[2];
            var date = new Date();
            var d2 = date.getDate();
            var m2 = 1 + date.getMonth();
            var y2 = date.getFullYear();
            var month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
            if (d1 > d2) {
                d2 = d2 + month[m2 - 1];
                m2 = m2 - 1;
            }
            if (m1 > m2) {
                m2 = m2 + 12;
                y2 = y2 - 1;
            }
            var d = d2 - d1;
            var m = m2 - m1;
            var y = y2 - y1;
            return y + ' Years ' + m + ' Months ' + d + ' Days ';
        },
        async info(item, index, button) {
            this.viewModal.title = `${item.applicant_name}`
            this.viewModal.content = item
            console.log(JSON.parse(item.successor_list))

            var applicant_national_id_number = item.applicant_national_id_number;
            var applicant_birth_certificate_number = item.applicant_birth_certificate_number;

            var nidVerify = await this.callApi('get', `/api/niddob/verify?applicant_national_id_number=${applicant_national_id_number}`, []);
            var dobVerify = await this.callApi('get', `/api/niddob/verify?applicant_birth_certificate_number=${applicant_birth_certificate_number}`, []);
            if (nidVerify.data == 1) {
                this.nidverify = true
            } else {
                this.nidverify = false

            }
            if (dobVerify.data == 1) {
                this.dobverify = true;
            } else {
                this.dobverify = false;

            }
            // console.log(nidVerify);
            // console.log(dobVerify);
            this.$root.$emit('bv::show::modal', this.viewModal.id, button)
        },
        resetInfoModal() {
            this.infoModal.title = ''
            this.infoModal.content = {}
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            // this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        sonodList() {
            return this.$emit('event-name')
        },
        async approve(route, id, status, button, ApproveType,item) {

// console.log(item.sonod_name)



            if (ApproveType == 'vueAction') {
                this.infoModal.content_id = `${id}`;
                this.infoModal.content = item;
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            } else if (ApproveType == 'apiAction') {


                if(this.Users.position=='Secretary'){

                    // if(item.sonod_name=='উত্তরাধিকারী সনদ' || item.sonod_name=='ওয়ারিশান সনদ'){
                    //     this.preLooding = true
                    //  Swal.fire({
                    //             title: 'Are you sure?',
                    //             text: `${status} this data!`,
                    //             icon: 'warning',
                    //             showCancelButton: true,
                    //             confirmButtonColor: '#3085d6',
                    //             cancelButtonColor: '#d33',
                    //             confirmButtonText: `Yes, ${status} it!`
                    //         }).then(async (result) => {
                    //             if (result.isConfirmed) {
                    //                 var res = await this.callApi('get', `${route}/${status}/${id}`, []);
                    //                 Notification.customSuccess(`Your data has been ${status}`);
                    //                 this.preLooding = false
                    //                 this.$emit('event-name')
                    //             }else{
                    //                this.preLooding = false
                    //             }
                    //         })
                    // }else{
                        this.infoModal.content_id = `${id}`;
                            this.infoModal.content = item;
                            this.$root.$emit('bv::show::modal', this.infoModal.id, button)
                    // }



                }else{
                    this.preLooding = true
                     Swal.fire({
                                title: 'Are you sure?',
                                text: `${status} this data!`,
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: `Yes, ${status} it!`
                            }).then(async (result) => {
                                if (result.isConfirmed) {
                                    var res = await this.callApi('get', `${route}/${status}/${id}`, []);
                                    Notification.customSuccess(`Your data has been ${status}`);
                                    this.preLooding = false
                                    this.$emit('event-name')
                                }else{
                                   this.preLooding = false
                                }
                            })
                }









            }
        },
        async cancel(route, id, status, button) {

            this.infoModal.content_id = `${id}`;
            this.infoModal.title = `Cancel`;
            this.$root.$emit('bv::show::modal', this.infoModal.id, button)



            //             if(this.ApproveType=='vueAction'){
            //  this.infoModal.content_id = `${id}`;
            //                 this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            //             }else if(this.ApproveType=='apiAction'){
            // Swal.fire({
            //     title: 'Are you sure?',
            //     text: `${status} this data!`,
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: `Yes, Not Approve it!`
            // }).then(async (result) => {
            //     if (result.isConfirmed) {
            //         var res = await this.callApi('get', `${route}/${status}/${id}`, []);
            //         Notification.customSuccess(`Your data has been Not Approve Success`);
            //         this.$emit('event-name')
            //     }
            // })
            // }
        },
        async paynow(route, id, button) {
            Swal.fire({
                title: 'Are you sure?',
                text: `Pay this data!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, Pay it!`
            }).then(async (result) => {
                if (result.isConfirmed) {
                    var res = await this.callApi('get', `${route}/${id}`, []);
                    Notification.customSuccess(`Your data has been Paid`);
                    this.$emit('event-name')
                }
            })
        },
        deletefun(item, index, event) {
            // console.log('item: '+item.id, 'index: '+index, 'event: '+event)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, Delete it!`
            }).then(async (result) => {
                if (result.isConfirmed) {
                    var res = await this.callApi('get', `${this.DeleteRoute}/${item.id}`, []);
                    Notification.customdelete(`Your data has been Deleted!`);
                    this.$emit('event-name')
                }
            })
        },
        async onSubmit() {

            this.f.district = this.Users.district;
            var res = await this.callApi('post', this.AllUpdate, this.f);
            this.$emit('event-name')
            // console.log(res)
            // this.getunionInfo();
            //     this.$router.push({ name: 'unionlist'})
            Notification.customSuccess('Payment Info Update Successfuly Done');


        },

        async formcancel() {
            var id = this.infoModal.content_id;
            this.b['names'] = this.Users.names;
            this.b['user_id'] = this.Users.id;
            this.b['position'] = this.Users.position;
            this.b['unioun'] = this.Users.unioun;
            this.b['status'] = 'cancel';
            this.b['sonod_id'] = id;

            var res = await this.callApi('post', `${this.CancelRoute}/cancel/${id}`, this.b);
            // console.log(res)
            this.$root.$emit('bv::hide::modal', 'info-modal')
            this.$emit('event-name')


            this.infoModal.title = ''
            this.infoModal.content = ''
            this.b = {
                reson: '',
            }
            Notification.customError(`Your data has been Canceled`);

        }

    }
}
</script>
<style>
.modal-dialog.modal-xl {
    max-width: 1200px;
}

.app-heading {
    text-align: center;
    margin: 32px 0;
    font-size: 23px;
    border-bottom: 1px solid #159513;
    color: #159513;
}

.customcheckbox {
    padding: 0 !important;
    width: 22px;
    height: 26px;
}
</style>
