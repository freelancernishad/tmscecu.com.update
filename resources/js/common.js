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
            } else if (text == 'মাসিক বেতন') {
                result = 'Monthly_fee';
            } else if (text == 'Session_fee') {
                result = 'সেশন ফি';
            } else if (text == 'সেশন ফি') {
                result = 'Session_fee';
            } else if (text == 'Exam_fee') {
                result = 'পরিক্ষার ফি';
            } else if (text == 'পরিক্ষার ফি') {
                result = 'Exam_fee';
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
            else if (str == 'ইংলিশ') {
                str = "English";
            }
            else if (str == 'ইংলিশ ১ম') {
                str = "English_1st";
            }
            else if (str == 'ইংলিশ ২য়') {
                str = "English_2nd";
            }
            else if (str == 'গনিত') {
                str = "Math";
            } else if (str == 'জীব-বিজ্ঞান') {
                str = "Biology";
            } else if (str == 'বিজ্ঞান') {
                str = "Science";
            } else if (str == 'পদার্থ') {
                str = "physics";
            } else if (str == 'রসায়ন') {
                str = "Chemistry";
            } else if (str == 'ভূগোল') {
                str = "vugol";
            } else if (str == 'অর্থনীতি') {
                str = "orthoniti";
            } else if (str == 'ইতিহাস') {
                str = "itihas";
            } else if (str == 'বাংলাদেশ ও বিশ্ব পরিচয়') {
                str = "B_and_B";
            } else if (str == 'ধর্ম') {
                str = "Religion";
            } else if (str == 'ইসলাম-ধর্ম') {
                str = "ReligionIslam";
            } else if (str == 'হিন্দু-ধর্ম') {
                str = "ReligionHindu";
            } else if (str == 'কৃষি') {
                str = "Agriculture";
            } else if (str == 'তথ্য ও যোগাযোগ প্রযোক্তি') {
                str = "ICT";
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
            //         "তথ্য ও যোগাযোগ প্রযোক্তি":"ICT",
            // }
            //     for (var x in banglaNumber) {
            //         str = str.replace(new RegExp(x, 'g'), banglaNumber[x]);
            //     }
            return str;
        },
        exam_comvert(str) {
            let banglaNumber =
            {
                "Weakly Examination": "Weakly_Examination",
                "ADMITION TEST RESULT": "ADMITION_TEST_RESULT",
                "First Terminals Examination": "First_Terminals_Examination",
                "Second Terminals Examination": "Second_Terminals_Examination",
                "Annual Examination": "Annual_Examination",
                "Test Examination": "Test_Examination",
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
                str = "ইংলিশ";
            }
            else if (str == 'English_1st') {
                str = "ইংলিশ ১ম";
            }
            else if (str == 'English_2nd') {
                str = "ইংলিশ ২য়";
            }
            else if (str == 'Math') {
                str = "গনিত";
            } else if (str == 'Science') {
                str = "বিজ্ঞান";
            } else if (str == 'physics') {
                str = "পদার্থ";
            } else if (str == 'Chemistry') {
                str = "রসায়ন";
            } else if (str == 'Biology') {
                str = "জীব-বিজ্ঞান";
            } else if (str == 'vugol') {
                str = "ভূগোল";
            } else if (str == 'orthoniti') {
                str = "অর্থনীতি";
            } else if (str == 'itihas') {
                str = "ইতিহাস";
            } else if (str == 'B_and_B') {
                str = "বাংলাদেশ ও বিশ্ব পরিচয়";
            } else if (str == 'Religion') {
                str = "ধর্ম";
            } else if (str == 'ReligionIslam') {
                str = "ইসলাম-ধর্ম";
            } else if (str == 'ReligionHindu') {
                str = "হিন্দু-ধর্ম";
            } else if (str == 'Agriculture') {
                str = "কৃষি";
            } else if (str == 'ICT') {
                str = "তথ্য ও যোগাযোগ প্রযোক্তি";
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
            //     "ICT": "তথ্য ও যোগাযোগ প্রযোক্তি"
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




    },
    computed: {



        ...mapGetters({

            'Users' : 'getUpdateUser',
            'classess' : 'getUpdateClasses',
        }),


    },
    mounted() {

    },




}
