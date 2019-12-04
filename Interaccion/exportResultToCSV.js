function download_csv(csv, filename) {
  var csvFile;
  var downloadLink;

  // CSV FILE
  csvFile = new Blob([csv], { type: 'text/csv' });

  // Download link
  downloadLink = document.createElement('a');

  // File name
  downloadLink.download = filename;

  // We have to create a link to the file
  downloadLink.href = window.URL.createObjectURL(csvFile);

  // Make sure that the link is not displayed
  downloadLink.style.display = 'none';

  // Add the link to your DOM
  document.body.appendChild(downloadLink);

  // Lanzamos
  downloadLink.click();
}

function export_table_to_csv(html, filename) {
  var csv = [];
  var rows = document.querySelectorAll('table tr');

  for (var i = 0; i < rows.length; i++) {
    var row = [],
      cols = rows[i].querySelectorAll('td, th');

    for (var j = 0; j < cols.length; j++) row.push(cols[j].innerText);

    csv.push(row.join(','));
  }

  // Download CSV
  download_csv(csv.join('\n'), filename);
}

window.onload = () => {
  console.log('Hola, ya cargué');
  //Bind event listener to the button to export table to csv
  let btnExportToCSV = document.querySelector('#btnExportToCSV');
  if (btnExportToCSV) {
    btnExportToCSV.addEventListener('click', function() {
      var html = document.querySelector('table').outerHTML;
      export_table_to_csv(html, 'table.csv');
    });
  }

  //button handler to change text color
/*   let textArea = document.querySelector('#form-one');
  textArea.addEventListener('input', e => {
    console.log(e.target.value);
    var text = e.target.value;

    if (text.indexOf('select') > -1) {
      text = text.replace('select', "<span class='blue'>select</span>");
    }

    if (text.indexOf('my age') > -1) {
      text = text.replace('my age', "<span class='blue'>my age</span>");
    }
    console.log(`Texto: ${text}`);
    textArea.value = text;
  }); */
};
