/**
 * Created by kumar on 05/10/2017.
 */

/**
 * Alerts Controller
 */

angular
    .module('RDash')
    .controller('UsersCtrl', ['$scope', UsersCtrl]);

function UsersCtrl($scope) {
    $scope.tabs = [
        { title:'Dynamic Title 1', content:'Dynamic content 1' },
        { title:'Dynamic Title 2', content:'Dynamic content 2', disabled: true }
    ];

    $scope.init = function () {
        if($scope.myPaper.actualPaper) {
            $scope.activeSection = "actualPaper";
            for(var i in $scope.myPaper.actualPaper.papers) {
                $scope.myPaper.actualPaper.papers[i].questions[0].isShow = true;
            }
        } else if($scope.myPaper.englishTyping) {
            $scope.activeSection = "englishTyping";
        }
    }

    $scope.setActiveSection = function (sec) {
        $scope.activeSection = sec;
    }

    $scope.showThisQuestion = function (ques, ind) {
        for(i in ques) {
            ques[i].isShow = false;
        }
        ques[ind].isShow = true;
    }

    $scope.getEnglishTypingWord = function () {
        var arr =$scope.myPaper.englishTyping.text.split(" ");
        $scope.totalEnglishWords = arr.length;
        var html = "";
        for(var i in arr) {
            html += "<span>" + arr[i] + "</span> ";
        }
        $scope.toShowEnglishWords = html;
    }
    $scope.totalStockestEnglishCount=0;
    $scope.$watch('myPaper.englishTyping.emglishTyped', function (val) {
        if(!val) return;
        $scope.totalStockestEnglishCount++;
        var arr1 = val.split(" ");
        var arr =$scope.myPaper.englishTyping.text.split(" ");
        var html = "";
        $scope.totalEnglishTypedWords = arr1.length;
        $scope.totalCorrectEnglishWords = 0;
        $scope.totalWrongEnglishWords = 0;
        $scope.totalTypedEnglishWords = 0;
        $scope.totalRemainingEnglishWords = 0;
        for(var i in arr) {
            if(arr1[i]) {
                $scope.totalTypedEnglishWords++;
                if(arr1[i] == arr[i]) {
                    $scope.totalCorrectEnglishWords++;
                    html += "<span  style='color:green'>" + arr[i] + "</span> ";
                } else {
                    $scope.totalWrongEnglishWords++;
                    html += "<span  style='color:red'>" + arr[i] + "</span> ";
                }
            } else {
                $scope.totalRemainingEnglishWords++;
                html += "<span>" + arr[i] + "</span> ";
            }
        }
        $scope.toShowEnglishWords = html;
    });

    $scope.myPaper = {
        actualPaper: {
            name: "Bank PO Paper",
            instructions: "Glyphicons. Bootstrap includes 260 glyphs from the Glyphicon Halflings set. Glyphicons Halflings are normally not available for free, but their creator has made them available for Bootstrap free of cost. As a thank you, you should include a link back to Glyphicons whenever possible.",
            time:20,
            papers: [{
                name:'Computer',
                questions: [{
                    question:"Captial Of Indai?",
                    options:["Mumbai", "Delhi", "Kolkata", "Banguluru"]
                },{
                    question:"Captial Of Bihar?",
                    options:["Mumbai", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of MP?",
                    options:["Bhopal", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of UP?",
                    options:["Bhopal", "Delhi", "Patna", "Lakhnow"]
                },{
                    question:"Captial Of Indai?",
                    options:["Mumbai", "Delhi", "Kolkata", "Banguluru"]
                },{
                    question:"Captial Of Bihar?",
                    options:["Mumbai", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of MP?",
                    options:["Bhopal", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of UP?",
                    options:["Bhopal", "Delhi", "Patna", "Lakhnow"]
                },{
                    question:"Captial Of Indai?",
                    options:["Mumbai", "Delhi", "Kolkata", "Banguluru"]
                },{
                    question:"Captial Of Bihar?",
                    options:["Mumbai", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of MP?",
                    options:["Bhopal", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of UP?",
                    options:["Bhopal", "Delhi", "Patna", "Lakhnow"]
                },{
                    question:"Captial Of Indai?",
                    options:["Mumbai", "Delhi", "Kolkata", "Banguluru"]
                },{
                    question:"Captial Of Bihar?",
                    options:["Mumbai", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of MP?",
                    options:["Bhopal", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of UP?",
                    options:["Bhopal", "Delhi", "Patna", "Lakhnow"]
                }]
            }, {
                name:'General',
                    questions:[{
                    question:"Captial Of Indai?",
                    options:["Mumbai", "Delhi", "Kolkata", "Banguluru"]
                },{
                    question:"Captial Of Bihar?",
                    options:["Mumbai", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of MP?",
                    options:["Bhopal", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of UP?",
                    options:["Bhopal", "Delhi", "Patna", "Lakhnow"]
                }]
            }, {
                name:'Aptitude',
                questions:[{
                    question:"Captial Of MP?",
                    options:["Bhopal", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of UP?",
                    options:["Bhopal", "Delhi", "Patna", "Lakhnow"]
                },{
                    question:"Captial Of Indai?",
                    options:["Mumbai", "Delhi", "Kolkata", "Banguluru"]
                },{
                    question:"Captial Of Bihar?",
                    options:["Mumbai", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of MP?",
                    options:["Bhopal", "Delhi", "Patna", "Banguluru"]
                },{
                    question:"Captial Of UP?",
                    options:["Bhopal", "Delhi", "Patna", "Lakhnow"]
                }]
            }],
        },
        englishTyping:{
            text:"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            time:10,
            name:"English Typing",
            instructions:"Lorem Ipsum is simply dummy text of the printing"
        },
        hindiTyping:{
            text: "सूचना को यथासंभव सही रूप में उपलब्ध कराने का हर संभव प्रयास किया गया है | इस वेबसाइट पर उपलब्ध जानकारी में अशुद्धता के कारण किसी भी व्यक्ति को होने वाली किसी भी प्रकार की हानि के लिए केन्द्रीय मृदा एवं सामग्री अनुसंधानशाला , जल संसाधन, नदी विकास और गंगा संरक्षण मंत्रालय जिम्मेदार नहीं होगा | किसी भी स्पष्टीकरण के लिए सी.एस.एम.आर.एस. से परामर्श लिया जा सकता है | कोई भी अनियमितता होने पर उसे सी.एस.एम.आर.एस. के संज्ञान में लाएं |",
            time:5,
            name:"Hindi Typing",
            instructions:"Lorem Ipsum has been the industry's standard"
        }
    }
}
