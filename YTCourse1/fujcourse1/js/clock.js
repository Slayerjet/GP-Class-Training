//Declare a name space (digitalClock) for our functions to avoid possible name conflicts in a larger dev team. The functions, once owned by an object are now called methods of the object
        var digitalClock = {
            formatNum : function(num){
              if(num < 10){
                num = '0' + num;
            }
            return num;  
            },
            updateTime: function(){
                var now = new Date();
            var hours = digitalClock.formatNum(now.getHours());
            var mins = digitalClock.formatNum(now.getMinutes());
            var secs = digitalClock.formatNum(now.getSeconds());
            document.getElementById('clock').innerHTML = hours + ':' + mins + ':' + secs;
            }
        }//End of 
        digitalClock.updateTime();
        setInterval(digitalClock.updateTime,1000)
        
//        function formatNum(num){
//            if(num < 10){
//                num = '0' + num;
//            }
//            return num;
//        }
//        
//        function updateTime(){
//            var now = new Date();
//            var hours = formatNum(now.getHours());
//            var mins = formatNum(now.getMinutes());
//            var secs = formatNum(now.getSeconds());
//            document.getElementById('clock').innerHTML = hours + ':' + mins + ':' + secs;
//        }