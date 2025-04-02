// set up listener for trigger for code to run
document.addEventListener('DOMContentLoaded',()=>{
            
    const preparetext=function(text,regex,rep){
        text=text.replace(/(\r\n|\n|\r)/gm, '');
        text=text.replace(/(\s\s)/gm, ' ');
        text=text.replace(/"/g, '""');
        return text;
    };

    // link to trigger button on html page based on name
    document.querySelector('input[type="button"][name="export"]').addEventListener('click',e=>{
        // link to table name
        let table=document.querySelector('table#last_100_table');
        // items to include in the query
        let colHeaders=table.querySelectorAll('tr th');
        let colRows=table.querySelectorAll('tr:not( .headers )');
        
        // variables e.g. exclude header with the name 'Update'
        let index=-1;
        let exclude='Maximo Update';
        let headers=[];
        let data=[];
        
        // collect header data
        colHeaders.forEach( ( th, i )=>{
            if( th.textContent!=exclude )headers.push( [ '"', preparetext( th.textContent ), '"' ].join('') )
            else index=i;
        });
        
        data.push( headers.join(',') );
        data.push( String.fromCharCode(10) );
        
        
        // collect table data
        if( index > -1 ){
            colRows.forEach( tr => {
            
                let cells=tr.querySelectorAll('td');
                let row=[];
                
                cells.forEach( ( td, i )=>{
                    if( i !== index ) row.push( [ '"', preparetext( td.textContent), '"' ].join('') )
                });
                
                data.push( row.join(',') );
                data.push( String.fromCharCode(10) );
            });
            
            // create document and export as csv file with file name based on table id and date
            let a=document.createElement('a');
                a.download='export_'+table.id+'_'+( new Date().toLocaleDateString() )+'.csv';
                a.href=URL.createObjectURL( new Blob( data ) );
                a.click();  
        }
    })
});