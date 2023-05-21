
        let ajax = new XMLHttpRequest();

        function RentOfDate(url, callback, format) {
    const ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4 && ajax.status === 200) {
            if (format === 'json') {
                console.log("json");
                callback(JSON.parse(ajax.responseText));
            } 
        }
    };
    ajax.open('GET', url);
    ajax.send();
}

function Rent() {
    const CostOfRent = document.getElementById('CostOfRent').value;
    RentOfDate('RentOfDate.php?CostOfRent=' + CostOfRent, 
        function(response) {
            console.log(response);
            document.getElementById('res1').innerHTML = response;
        },
        'json');
} 

        function Vendorcars(url, callback, format) {
    const ajax3 = new XMLHttpRequest();
    ajax3.onreadystatechange = function() {
        if (ajax3.readyState === 4 && ajax3.status === 200) {
            if (format === 'xml') {
                console.log("xml");
                callback(ajax3.responseXML);
            }           
        }
    };
    ajax3.open('GET', url);
    ajax3.send();
    
}
function Ven(){
        const VendorName = document.getElementById('VendorName').value;
       Vendorcars('Vendorcars.php?VendorName=' + VendorName, 
        function(response) {
            console.log(response);

            const nodes = response.getElementsByTagName('VendorName');
            let list = '<ul>';
            for (let i = 1; i < nodes.length; i++) {
                list += '<li>' + nodes[i].childNodes[0].nodeValue + '</li>';
            }
            list += '</ul>';
            document.getElementById('res2').innerHTML = list;
        },
         'xml');
    }
