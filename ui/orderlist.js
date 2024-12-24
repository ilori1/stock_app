
// $('.print-bill').on('click', function() {
//     console.log('Button clicked!');
//     var invoice_id = $(this).attr('data-id');
//     console.log('Invoice ID:', invoice_id);
    
//     // Load print bill page in an iframe
//     var iframe = $('<iframe id="printFrame" src="printbill.php?id=' + invoice_id + '" style="display:none;"></iframe>');
//     $('body').append(iframe);
    
//     // Print the iframe content
//     iframe.on('load', function() {
//       console.log('Iframe loaded!');
//       window.setTimeout(function() {
//         console.log('Printing iframe content...');
//         iframe[0].contentWindow.print();
//         iframe.remove();
//       }, 1000);
//     });
//   });
  