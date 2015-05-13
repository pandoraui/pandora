/********************************
 * @description:  绘制日历
 * @author:       yanzj@Ctrip.com
 */
define([],function(){
    
    function Calendar(options) {
        var defaults = {
                "curDate" : "",   //当前日期 "2014-05-13"
                "startDate" : "", //开始日期
                "endDate": "",    //结束日期
                "posWeek" : 0,              //当前/开始日期位置
                "showWeekLine" : 6,         //日历周数
                "fillBlank": true,          //是否填充上下月数据
                "festival": {               //节假日
                    'xxxx-01-01': '元旦',
                    'xxxx-05-01': '五一',
                    'xxxx-10-01': '国庆',
                    '2014-04-05': '清明','2015-04-05': '清明','2016-04-04': '清明','2017-04-04': '清明','2018-04-05': '清明','2019-04-05': '清明','2020-04-04': '清明',
                    '2014-06-02': '端午','2015-06-20': '端午','2016-06-09': '端午','2017-05-30': '端午','2018-06-18': '端午','2019-06-07': '端午','2020-06-25': '端午',
                    '2014-09-08': '中秋','2015-09-27': '中秋','2016-09-15': '中秋','2017-10-04': '中秋','2018-09-24': '中秋','2019-09-13': '中秋','2020-10-01': '国庆',
                    '2015-02-19': '春节','2016-02-08': '春节','2017-01-28': '春节','2018-02-16': '春节','2019-02-05': '春节','2020-01-25': '春节','2021-02-12': '春节'
                },
                "template" : '<%cals.forEach(function(week,i){%>'
                           + '<tr>'
                           + '    <%week.forEach(function(dd,j){%>'
                           + '    <td data-date="<%=dd.date%>" <%if(dd.style){%>class="<%=dd.style%>"<%}%> ><%=dd.day%><%if(dd.text){%><%=dd.text%><%}%></td>'
                           + '    <%})%>'
                           + '</tr>'
                           + '<%})%>'
            };
        this.opt = $.extend(true, defaults, options || {});
        this.init(this.opt);
    }

    function strDateFormat(strDate) {
        var d = null;
        if (typeof strDate === "string") {
            d = strDate.split("-");
            if(d[1]<=9) d[1] = '0'+parseInt(d[1],10);
            if(d[2]<=9) d[2] = '0'+parseInt(d[2],10);
        }

        return d.join('-');
    }

    Calendar.prototype = {
        constructor: Calendar,
        
        //+——————————————————— 
        //| 初始化
        //+——————————————————— 
        init: function (opt) {
            //this.opt = opt;
            var today = this.getFormatDate(new Date())
            opt.curDate = strDateFormat(opt.curDate) || today;
            opt.startDate = strDateFormat(opt.startDate) || today;
            opt.endDate = strDateFormat(opt.endDate) || today;
            this.drawCalDate();
        },
        //+——————————————————— 
        //| 绘制日历 DOM 树
        //+——————————————————— 
        drawCalDate: function(){
            var self = this;
            var html = '',
                calDates = [],
                startDate = self.opt.startDate,
                endDate = self.opt.endDate,
                dates = self.getDatesByRange();

            //数据遍历
            dates.forEach(function(week,i){
                calDates[i] = ['','','','','','',''];
                week.forEach(function(day,j){
                    if(day){
                        var d = {};
                        d.date = day;
                        //before start in end after
                        //d.day = day.split(/[\-\s?\:]/);
                        //d.text = day;
                        if(self.compareDate(day,startDate) > 0){
                            //
                        }else if(self.compareDate(day,endDate) < 0){
                            //
                        }else if((self.compareDate(day,startDate) < 0) && (self.compareDate(day,endDate) > 0)){
                            d.style = 'sta-on';
                        }else if(self.compareDate(day,startDate) == 0){
                            d.style = 'sta-on sta-begin';
                            d.text = '<span class="ui-label">出航</span>';
                        }else if(self.compareDate(day,endDate) == 0){
                            d.style = 'sta-on sta-end';
                            d.text = '<span class="ui-label">返航</span>';
                        }
                        //日期重要度：月份>今天>节日>日期
                        d.day = self.getFestival(day);
                        //console.log(d)
                        calDates[i][j] = d;
                    }
                    
                });
            });
            
            //增加节假日
            this.CalHTML = _.template(this.opt.template,{'cals':calDates});
        },
        getFestival:function(date){
            //日期重要度：月份>今天>节日>日期
            var self = this,
                festival = self.opt.festival,
                fesd = 'xxxx-' + date.substr(-5),
                fesday = '',
                today = self.getFormatDate(new Date()),
                d = date.split(/[\-\s?\:]/);
            
            //date = d[2] == 1 ? d[1] : date;
            // switch (date) {
            //     case 1:
            //         fesday = parseInt(d[1]) + '月';
            //          break;
            //     case today:
            //         return "今天";
            //          break;
            //     default:
            //         return festival[date] ? festival[date] : (festival[fesd] ? festival[fesd] : parseInt(d[2]));
            //         break;
            // }
            if(festival[date] || festival[fesd]) {
                fesday = festival[date] || festival[fesd];
                //alert(fesday)
            }else if(date == today){
                fesday = "今天";
            }else if(d[2] == 1){
                fesday = parseInt(d[1],10) + '月';
            }else{
                fesday = parseInt(d[2],10);
            }
            return fesday;
        },

        //+——————————————————— 
        //| 获取指定长度的Date数据
        //| @ startDate [string]
        //| @ lenght [int]
        //+——————————————————— 
        getArrDays:function(startDate,length){
            var arr = [],
                //dayObj = {},
                date;
            for(var i=0;i<length;i++){
                date = this.getTheDate(startDate,{diffDays : i});
                //dayObj.strDate = this.getFormatDate(date);
                date = this.getFormatDate(date);
                arr.push(date);
            }
            return arr;
        },
        //+——————————————————— 
        //| 日期格式化
        //| @ date [string] 2014-06-06
        //| @ format [string] YYYY-MM-DD hh-mm-ss
        //+——————————————————— 
        getFormatDate:function(date,format){
            var y = date.getFullYear(),
                m = date.getMonth()+1,
                d = date.getDate();
            if(m <= 9) m = "0"+parseInt(m,10);
            if(d <= 9) d = "0"+parseInt(d,10);
            switch(format){
                case 'YYYY-MM-DD':
                default:
                    return y+'-'+m+'-'+d;
            }
        },
        //+——————————————————— 
        //| 比较日期大小
        //| @ d1,d2 比较的日期[YYYY-MM-DD hh-mm-ss]
        //| @ type 比较的精度类型
        //+——————————————————— 
        compareDate:function(d1,d2,stype){
            var type = stype || 'YYYY-MM-DD',
                len = type.replace(/[\-\s?\:]/g,'').lenght;
            // d1 = d1.split(/[\-\s?\:]/);
            // d2 = d2.split(/[\-\s?\:]/);
            d1 = d1.replace(/[\-\s?\:]/g,'').substr(0,len);
            d2 = d2.replace(/[\-\s?\:]/g,'').substr(0,len);
            return d2-d1;
        },
        //+——————————————————— 
        //| 获取指定日期Date类型
        //| @ date [string] 2014-06-06
        //| @ diff {} 差值调整
        //+——————————————————— 
        getTheDate: function(date,odiff) {
            var d = null;
            var diff = odiff || {};
            diff = $.extend(true, {
                year: 0,
                month: 0,
                day: 0,
                diffDays: 0   //差值 单位天数
            }, diff);

            if (typeof date === "string") {
                d = date.split("-");
                d = new Date(
                    parseInt(d[0],10) + diff.year,
                    parseInt(d[1],10) - 1 + diff.month,
                    (parseInt(d[2],10) || 0) + diff.day + diff.diffDays
                );
            }
            
            return d;
        },
        //+——————————————————— 
        //| 字符串转成日期类型 
        //| 输入格式 MM/dd/YYYY MM-dd-YYYY YYYY/MM/dd YYYY-MM-dd 
        //+——————————————————— 
        strToDate : function(dateStr) { 
            var converted = Date.parse(dateStr); 
            var theDate = new Date(converted); 
            if (isNaN(theDate)) { 
                //var delimCahar = dateStr.indexOf(‘/’)!=-1?’/':’-'; 
                var arys= dateStr.split('-'); 
                theDate = new Date(arys[0], arys[1] * -1, arys[2]); 
            } 
            return theDate; 
        },
        //+——————————————————— 
        //| 生成日历 7*Line 二维数组
        //+——————————————————— 
        getDatesByRange: function () {
            var opt = this.opt;
            //目前实现的功能
            //@ 给定开始结束日期，绘出指定周数的日历，开始日期位于日历第二周(现前后跨度一个月)
            //
            //需要当前年月，当前月，上下月，开始结束月及这无个月的天数
            var result = [],
                startDate = this.getTheDate(opt.startDate), //开始日期
                startDay = startDate.getDate(), //当前几号
                weekPos = startDate.getDay(),   //当前周几
                firstDate = this.getTheDate(opt.startDate.substr(0,7)),
                firstWeekPos = firstDate.getDay(),  //当月第一天周几
                daysCurDate = this.getTheDate(opt.startDate.substr(0,7),{month:1}).getDate(),   //当月天数
                fixDays,
                startDateFix,
                curPos = 1,     //绘制日历索引
                line = 0;       //绘制日历 行/周
            
            //获得修正的开始日期
            //opt.fillBlank 填补功能
            if(opt.posWeek < 0) {
                opt.posWeek = 0;
            } 
            fixDays = opt.posWeek ? ((opt.posWeek-1)*7 + weekPos) : (startDay + (opt.fillBlank ? firstWeekPos : -1));
            startDateFix = this.getTheDate(opt.startDate,{diffDays : -fixDays});
            startDateFix = this.getFormatDate(startDateFix);

            //获得长度为 opt.showWeekLine*7 的日历date数据
            var rangeDate = this.getArrDays(startDateFix,opt.showWeekLine*7);
            //console.log(rangeDate)

            //构建初步日历数组
            for (var i = 0; i < opt.showWeekLine; i++) {
                result.push(['', '', '', '', '', '', '']);
            }

            if(!opt.posWeek && !opt.fillBlank){
                var curr = 0;
                line = 1;
                for (var j = firstWeekPos+1; j < 7; j++) {
                    result[0][j] = rangeDate[curr++];
                    //console.log(result[0])
                }
                while (curr < daysCurDate) {
                    for (var k = 0; k < 7; k++) {
                        if (curr >= daysCurDate) {
                            break;
                        }
                        result[line][k] = rangeDate[curr++];
                    }
                    //console.log(result[line])
                    line++;
                }
                
            }else{
                for(var l = 0,k=0;l<opt.showWeekLine; l++){
                    for(var m = 0; m <7; m++){
                        result[l][m] = rangeDate[k++];
                    }
                    //console.log(result[i]);
                }
            }
            return result;
        }

    }


    return Calendar;

});