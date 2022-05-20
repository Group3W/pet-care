<script> 
                var date = new Date();
                var year = date.getFullYear();
                var month = date.getMonth()+1;
                var day = String(date.getDate()).padStart(2,'0');
                var date = year + '-' + month + '-' + day;
                document.getElementById('date').innerHTML = date;
                </script>