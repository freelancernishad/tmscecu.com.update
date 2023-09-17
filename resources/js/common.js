import { mapGetters } from 'vuex'
export default {
    created() {

    },
    data(){
        return {
            numbers: {
                0: "০",
                1: "১",
                2: "২",
                3: "৩",
                4: "৪",
                5: "৫",
                6: "৬",
                7: "৭",
                8: "৮",
                9: "৯",
              },
              months: ["January","February","March","April","May","June","July","August","September","October","November","December"],
              school_id: this.$localStorage.getItem('getschoolid'),
              exams:{},
              subjects:{},
              religions:{},
              groups:{},
              schoolinfo:{},


        }
    },

    methods: {
        async callApi(method, url, dataObj ){
            try {
              return await axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            } catch (e) {
                return e.response
            }
        },


        ex_fee_name(name){
            if(name=='Half_yearly_examination'){
                return 'অর্ধ বার্ষিক পরীক্ষার ফি';
            }else if(name=='Half_yearly_evaluation'){
                return 'অর্ধ বার্ষিক মূল্যায়ন ফি';
            }else if(name=='Annual Examination'){
                return 'বার্ষিক পরীক্ষার ফি';
            }else if(name=='Annual_Examination'){
                return 'বার্ষিক পরীক্ষার ফি';
            }else if(name=='Annual_assessment'){
                return 'বার্ষিক মূল্যায়ন ফি';
            }else if(name=='Model_test_exam'){
                return 'মডেল টেস্ট পরীক্ষার ফি';
            }else if(name=='Pre_selection_examination'){
                return 'প্রাক-নির্বাচনী পরীক্ষার ফি';
            }else if(name=='Selective_Exam'){
                return 'নির্বাচনী পরীক্ষার ফি';
            }else if(name=='Continuous_assessment'){
                return 'ধারাবাহিক মূল্যায়ন ফি';
            }else if(name=='Summative_Assessment'){
                return 'সামষ্টিক মূল্যায়ন ফি';
            }

        },

        ex_name(name){
            if(name=='Half_yearly_examination'){
                return 'অর্ধ বার্ষিক পরীক্ষা';
            }else if(name=='Half_yearly_evaluation'){
                return 'অর্ধ বার্ষিক মূল্যায়ন';
            }else if(name=='Annual Examination'){
                return 'বার্ষিক পরীক্ষা';
            }else if(name=='Annual_Examination'){
                return 'বার্ষিক পরীক্ষা';
            }else if(name=='Annual_assessment'){
                return 'বার্ষিক মূল্যায়ন';
            }else if(name=='Model_test_exam'){
                return 'মডেল টেস্ট পরীক্ষা';
            }else if(name=='Pre_selection_examination'){
                return 'প্রাক-নির্বাচনী পরীক্ষা';
            }else if(name=='Selective_Exam'){
                return 'নির্বাচনী পরীক্ষা';
            }else if(name=='Continuous_assessment'){
                return 'ধারাবাহিক মূল্যায়ন';
            }else if(name=='Summative_Assessment'){
                return 'সামষ্টিক মূল্যায়ন';
            }

        },


         class_en_to_bn(name){

            if(name=='Play'){
                return 'শিশু শ্রেণি';
            }else if(name=='Nursery'){
                return 'নার্সারি';
            }else if(name=='One'){
                return 'প্রথম শ্রেণি';
            }else if(name=='Two'){
                return 'দ্বিতীয় শ্রেণি';
            }else if(name=='Three'){
                return 'তৃতীয় শ্রেণী';
            }else if(name=='Four'){
                return 'চতুর্থ শ্রেণী';
            }else if(name=='Five'){
                return 'পঞ্চম শ্রেণী';
            }else if(name=='Six'){
                return 'ষষ্ঠ শ্রেণী';
            }else if(name=='Seven'){
                return 'সপ্তম শ্রেণী';
            }else if(name=='Eight'){
                return 'অষ্টম শ্রেণী';
            }else if(name=='Nine'){
                return 'নবম শ্রেণী';
            }else if(name=='Ten'){
                return 'দশম শ্রেণী';
            }else{

                return 'কোনো শ্রেণি নেই';
            }

            },








            feeStatusText(status){
                if(status==1){
                    return '<span class="badge badge-pill badge-success">Active</span>';
                }else if(status==0){
                    return '<span class="badge badge-pill badge-danger">Deactive</span>';
                }
            },



        async schoolDetial(type=''){
            var res = await this.callApi('get',`/api/school/settings?school_id=${this.school_id}&front=${type}`,[]);
            this.schoolinfo = res.data
        },
        paymentamount(type, classname) {
            var needAmount;
            if (type == 'Monthly_fee') {
                if (classname == 'Eight') {
                    needAmount = 500;
                } else if (classname == 'Nine') {
                    needAmount = 500;
                } else if (classname == 'Ten') {
                    needAmount = 500;
                } else {
                    needAmount = 400;
                }
            } else if (type == 'Session_fee') {
                needAmount = 500;
            } else if (type == 'Exam_fee') {
                needAmount = 200;
            } else {
                needAmount = 0;
            }
            return needAmount;
        },
        feesconvert(text) {
            var result;
            if (text == 'Monthly_fee') {
                result = 'মাসিক বেতন';
            }else if (text == 'monthly_fee') {
                result = 'মাসিক বেতন';
            } else if (text == 'মাসিক বেতন') {
                result = 'Monthly_fee';
            } else if (text == 'Session_fee') {
                result = 'সেশন ফি';
            } else if (text == 'সেশন ফি') {
                result = 'Session_fee';
            } else if (text == 'Exam_fee') {
                result = 'পরিক্ষার ফি';
            } else if (text == 'exam_fee') {
                result = 'পরিক্ষার ফি';
            } else if (text == 'পরিক্ষার ফি') {
                result = 'Exam_fee';
            } else if (text == 'Admission_fee') {
                result = 'ফর্ম ফি';
            } else if (text == 'ফর্ম ফি') {
                result = 'Admission_fee';
            } else if (text == 'registration_fee') {
                result = 'রেজিস্ট্রেশন ফি';
            } else if (text == 'রেজিস্ট্রেশন ফি') {
                result = 'registration_fee';
            } else if (text == 'form_filup_fee') {
                result = 'ফরম পূরণ ফি';
            } else if (text == 'ফরম পূরণ ফি') {
                result = 'form_filup_fee';
            } else if (text == 'session_fee') {
                result = 'ভর্তি/সেশন ফি';
            } else if (text == 'ভর্তি/সেশন ফি') {
                result = 'session_fee';
            } else if (text == 'letter_of_appreciation') {
                result = 'প্রশংসা পত্র ফি';
            } else if (text == 'প্রশংসা পত্র ফি') {
                result = 'letter_of_appreciation';
            } else if (text == 'Other') {
                result = 'অন্যান্য';
            } else if (text == 'অন্যান্য') {
                result = 'Other';
            }
            return result;
        },

        async monthslist(){
            var res = await this.callApi('get',`/api/years/list?type=month`,[]);
            this.months = res.data;

        },
            async yearslist(){
            var res = await this.callApi('get',`/api/years/list?type=year`,[]);
            this.years = res.data;
        },
            async all_list(type = '', classname = '', group = ''){
            var res = await this.callApi('get',`/api/years/list?type=${type}&class=${classname}&group=${group}`,[]);
            if(type=='groups'){
                this.groups = res.data;
            }else if(type=='exams'){
                this.exams = res.data;
            }else if(type=='religions'){
                this.religions = res.data;
            }else if(type=='subjects'){
                this.subjects = res.data;
            }

        },
        subjectconverten(str) {
            if (str == 'বাংলা') {
                str = "Bangla";
            } else if (str == 'বাংলা ১ম') {
                str = "Bangla_1st";
            }
            else if (str == 'বাংলা ২য়') {
                str = "Bangla_2nd";
            }
            else if (str == 'ইংরেজি') {
                str = "English";
            }
            else if (str == 'ইংরেজি ১ম') {
                str = "English_1st";
            }
            else if (str == 'ইংরেজি ২য়') {
                str = "English_2nd";
            }
            else if (str == 'গণিত') {
                str = "Math";
            } else if (str == 'জীব বিজ্ঞান') {
                str = "Biology";
            } else if (str == 'বিজ্ঞান') {
                str = "Science";
            } else if (str == 'পদার্থবিজ্ঞান') {
                str = "physics";
            } else if (str == 'রসায়ন') {
                str = "Chemistry";
            } else if (str == 'ভূগোল ও পরিবেশ') {
                str = "vugol";
            } else if (str == 'অর্থনীতি') {
                str = "orthoniti";
            } else if (str == 'বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস') {
                str = "itihas";
            } else if (str == 'বাংলাদেশ ও বিশ্ব পরিচয়') {
                str = "B_and_B";
            } else if (str == 'ধর্ম ও নৈতিক শিক্ষা') {
                str = "Religion";
            } else if (str == 'ইসলাম-ধর্ম') {
                str = "ReligionIslam";
            } else if (str == 'হিন্দু-ধর্ম') {
                str = "ReligionHindu";
            } else if (str == 'কৃষি শিক্ষা') {
                str = "Agriculture";
            } else if (str == 'উচ্চতর গণিত') {
                str = "Higher_Mathematics";
            } else if (str == 'তথ্য ও যোগাযোগ প্রযুক্তি') {
                str = "ICT";
            } else if (str == 'শারীরিক শিক্ষা ও স্বাস্থ্য') {
                str = "Physical_Education_and_Health";
            } else if (str == 'চারু ও কারুকলা') {
                str = "Arts_and_Crafts";
            } else if (str == 'কর্ম ও জীবনমুখী শিক্ষা') {
                str = "Work_and_life_oriented_education";
            } else if (str == 'ক্যারিয়ার শিক্ষা') {
                str = "Career_Education";
            }
            //         let banglaNumber=
            //         {
            //         "বাংলা":"Bangla",
            //         "বাংলা ১ম":"Bangla_1st",
            //         "বাংলা ২য়":"Bangla_2nd",
            //         "ইংলিশ":"English",
            //         "ইংলিশ ১ম":"English_1st",
            //         "ইংলিশ ২য়":"English_2nd",
            //         "গনিত":"Math",
            //         "বিজ্ঞান":"Science",
            //         "পদার্থ":"physics",
            //         "রসায়ন":"Chemistry",
            //         "জীব-বিজ্ঞান":"Biology",
            //         "ভূগোল":"vugol",
            //         "অর্থনীতি":"orthoniti",
            //         "ইতিহাস":"itihas",
            //         "বাংলাদেশ ও বিশ্ব পরিচয়":"B_and_B",
            //         "ধর্ম":"Religion",
            //         "ইসলাম-ধর্ম":"ReligionIslam",
            //         "হিন্দু-ধর্ম":"ReligionHindu",
            //         "কৃষি":"Agriculture",
            //         "তথ্য ও যোগাযোগ প্রযুক্তি":"ICT",
            // }
            //     for (var x in banglaNumber) {
            //         str = str.replace(new RegExp(x, 'g'), banglaNumber[x]);
            //     }
            return str;
        },
        exam_comvert(str) {
            let banglaNumber =
            {

                "Admition Result":"Admition_Result",
                "Half Yearly":"Half_Yearly",
                 "Pre-Test":"Pre_Test",
                 "Annual Examination":"Annual_Examination",
                 "Model Test":"Model_Test",
                 "Test":"Test",

                // "Weakly Examination": "Weakly_Examination",
                // "ADMITION TEST RESULT": "ADMITION_TEST_RESULT",
                // "First Terminals Examination": "First_Terminals_Examination",
                // "Second Terminals Examination": "Second_Terminals_Examination",
                // "Annual Examination": "Annual_Examination",
                // "Test Examination": "Test_Examination",
            }
            for (var x in banglaNumber) {
                str = str.replace(new RegExp(x, 'g'), banglaNumber[x]);
            }
            return str;
        },
        subjectconvertbn(str) {

            if (str == 'Bangla') {
                str = "বাংলা";
            } else if (str == 'Bangla_1st') {
                str = "বাংলা ১ম";
            }
            else if (str == 'Bangla_2nd') {
                str = "বাংলা ২য়";
            }
            else if (str == 'English') {
                str = "ইংরেজি";
            }
            else if (str == 'English_1st') {
                str = "ইংরেজি ১ম";
            }
            else if (str == 'English_2nd') {
                str = "ইংরেজি ২য়";
            }
            else if (str == 'Math') {
                str = "গণিত";
            } else if (str == 'Science') {
                str = "বিজ্ঞান";
            } else if (str == 'physics') {
                str = "পদার্থবিজ্ঞান";
            } else if (str == 'Chemistry') {
                str = "রসায়ন";
            } else if (str == 'Biology') {
                str = "জীব বিজ্ঞান";
            } else if (str == 'vugol') {
                str = "ভূগোল ও পরিবেশ";
            } else if (str == 'orthoniti') {
                str = "অর্থনীতি";
            } else if (str == 'itihas') {
                str = "বাংলাদেশ ও বিশ্ব সভ্যতার ইতিহাস";
            } else if (str == 'B_and_B') {
                str = "বাংলাদেশ ও বিশ্ব পরিচয়";
            } else if (str == 'Religion') {
                str = "ধর্ম ও নৈতিক শিক্ষা";
            } else if (str == 'ReligionIslam') {
                str = "ইসলাম-ধর্ম";
            } else if (str == 'ReligionHindu') {
                str = "হিন্দু-ধর্ম";
            } else if (str == 'Higher_Mathematics') {
                str = "উচ্চতর গণিত";
            } else if (str == 'Agriculture') {
                str = "কৃষি শিক্ষা";
            } else if (str == 'ICT') {
                str = "তথ্য ও যোগাযোগ প্রযুক্তি";
            } else if (str == 'Physical_Education_and_Health') {
                str = "শারীরিক শিক্ষা ও স্বাস্থ্য";
            } else if (str == 'Arts_and_Crafts') {
                str = "চারু ও কারুকলা";
            } else if (str == 'Work_and_life_oriented_education') {
                str = "কর্ম ও জীবনমুখী শিক্ষা";
            } else if (str == 'Career_Education') {
                str = "ক্যারিয়ার শিক্ষা";
            }


            // let banglaNumber =
            // {
            //     "Bangla": "বাংলা",
            //     "Bangla_1st": "বাংলা ১ম",
            //     "Bangla_2nd": "বাংলা ২য়",
            //     "English": "ইংলিশ",
            //     "English_1st": "ইংলিশ ১ম",
            //     "English_2nd": "ইংলিশ ২য়",
            //     "Math": "গনিত",
            //     "Science": "বিজ্ঞান",
            //     "physics": "পদার্থ",
            //     "Chemistry": "রসায়ন",
            //     "Biology": "জীব-বিজ্ঞান",
            //     "vugol": "ভূগোল",
            //     "orthoniti": "অর্থনীতি",
            //     "itihas": "ইতিহাস",
            //     "B_and_B": "বাংলাদেশ ও বিশ্ব পরিচয়",
            //     "Religion": "ধর্ম",
            //     "ReligionIslam": "ইসলাম-ধর্ম",
            //     "ReligionHindu": "হিন্দু-ধর্ম",
            //     "Agriculture": "কৃষি",
            //     "ICT": "তথ্য ও যোগাযোগ প্রযুক্তি"
            // }
            // for (var x in banglaNumber) {
            //     str = str.replace(new RegExp(x, 'g'), banglaNumber[x]);
            // }
            return str;
        },
        examcomvert(str) {
            let banglaNumber =
            {
                "Weakly_Examination": "Weakly Examination",
                "ADMITION_TEST_RESULT": "ADMITION TEST RESULT",
                "First_Terminals_Examination": "First Terminals Examination",
                "Second_Terminals_Examination": "Second Terminals Examination",
                "Annual_Examination": "Annual Examination",
                "Test_Examination": "Test Examination"
            }
            for (var x in banglaNumber) {
                str = str.replace(new RegExp(x, 'g'), banglaNumber[x]);
            }
            return str;
        },
        dateformatGlobal(date=''){
           return  User.dateformat(date);
        },

         getMonthFromString(mon){
            return new Date(Date.parse(mon +" 10, 2022")).getMonth()+1
         },
        // int_en_to_bn(input=0){
        //     var output = [];
        //     for (var i = 0; i < input.length; ++i) {
        //       if (numbers.hasOwnProperty(input[i])) {
        //         output.push(numbers[input[i]]);
        //       } else {
        //         output.push(input[i]);
        //       }
        //     }
        //     return output.join('');

        // },


        int_en_to_bn(text=0) {
            var result;
            if (text == '0') {
                result = '০';
            } else if (text == '1') {
                result = '১';
            } else if (text == '2') {
                result = '২';
            } else if (text == '3') {
                result = '৩';
            } else if (text == '4') {
                result = '৪';
            } else if (text == '5') {
                result = '৫';
            } else if (text == '6') {
                result = '৬';
            } else if (text == '7') {
                result = '৭';
            } else if (text == '8') {
                result = '৮';
            } else if (text == '9') {
                result = '৯';
            }
            return result;
        },


        int_bn_to_en(text='০') {
            var result;
            if (text == '০') {
                result = '০';
            } else if (text == '১') {
                result = '1';
            } else if (text == '২') {
                result = '2';
            } else if (text == '৩') {
                result = '3';
            } else if (text == '৪') {
                result = '4';
            } else if (text == '৫') {
                result = '5';
            } else if (text == '৬') {
                result = '6';
            } else if (text == '৭') {
                result = '7';
            } else if (text == '৮') {
                result = '8';
            } else if (text == '৯') {
                result = '9';
            }
            return result;
        },




    },
    computed: {



        ...mapGetters({

            'Users' : 'getUpdateUser',
            'classess' : 'getUpdateClasses',
            'schoolSettings' : 'getschoolinfo',
        }),


    },
    mounted() {

    },




}
