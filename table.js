function Vendor()
{
	let ajax = new XMLHttpRequest();
    let vendor= document.getElementById('vendor').value;
   
	ajax.open('GET', 'vendor.php?vendor='+vendor);
	
	
	ajax.onload = function() {
        let table_vendor = document.getElementById('table_vendor');
        table_vendor.innerHTML='';
        let response = ajax.responseText;
        if(response==null)
        {
            return;
        }
		
        let result = JSON.parse(response);
        
        let table = document.createElement('table');
        let tr = document.createElement('tr');
        let th = document.createElement('th');
        th.innerText = 'Name';
        tr.appendChild(th);
    
        th = document.createElement('th');
        th.innerText = 'Price';
        tr.appendChild(th);
   
        table.appendChild(tr);
        result.forEach(element => {
            tr = document.createElement('tr');

            let td = document.createElement('td');
            td.innerText = element.name;
            tr.appendChild(td);

            td = document.createElement('td');
            td.innerText = element.price;
            tr.appendChild(td);
             
            table.appendChild(tr);
        });
        table_vendor.appendChild(table);
    }
	
	ajax.send();

}

function Category()
{
	let ajax = new XMLHttpRequest();

    let category = document.getElementById("category").value;
    
    ajax.onreadystatechange = function() {
		if (ajax.readyState === 4 && ajax.status === 200) {
			
			document.getElementById("table_category").innerHTML = ajax.responseText;
		}
    };

    ajax.open('GET', 'category.php?category='+category);
    ajax.send();
}

function Price()
{
	let ajax = new XMLHttpRequest();
    let minPrice = document.getElementById("minPrice").value; 
    let maxPrice = document.getElementById("maxPrice").value; 
    ajax.onload = function()  
    {
        let table_price = document.getElementById("table_price"); 
        table_price.innerHTML = '';
        let xml = ajax.responseXML;
        if(xml == null) {
            return;
        }
        let name =xml.getElementsByTagName("name");
        let price=xml.getElementsByTagName("price");
        let table = document.createElement('table');
		let tr = document.createElement('tr');
        let th = document.createElement('th');
        th.innerText = 'Name';
        tr.appendChild(th);
    
        th = document.createElement('th');
        th.innerText = 'Price';
        tr.appendChild(th);
   
        table.appendChild(tr);
        for (var i = 0; i < name.length; i++) 
        {
            let tr = document.createElement('tr');

			let td = document.createElement('td');
			td.innerHTML = name[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = price[i].textContent;
			tr.appendChild(td);

			table.appendChild(tr);
        }
		table_price.appendChild(table);
    };
    
    ajax.open('GET', 'price.php?minPrice='+minPrice+'&maxPrice='+maxPrice);
    ajax.send();
}
