//ck editor
window.addEventListener("load", (e)=>{
    ClassicEditor.create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

 
});
const ctx = document.getElementById('salesChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});


const visitorCtx = document.getElementById('visitorChart');

new Chart(visitorCtx, {
  type: 'doughnut',
  data: {
    labels: ['Facebook', 'Google', 'Bing', 'Linkdin', 'Website', 'Twitter'],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

function storeProject()
        {   
            $("#buyNow").prop('disabled', true);
            let url = $('meta[name=app-url]').attr("content") + "/order-store";
            let data = {
                productTitle: $("#product-title").val(),
                productPrice: $("#product-price").val(),
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                type: "POST",
                data: data,
                success: function(response) {
                    $("#buyNow").prop('disabled', false);
                    let successHtml = '<div class="alert alert-success" role="alert"><b>Project Created Successfully</b></div>';
                    $("#alert-div").html(successHtml);
                    $("#product-title").val("");
                    $("#productPrice").val("");
                    showAllProjects();
                    $("#form-modal").modal('hide');
                },
                error: function(response) {
                    $("#buyNow").prop('disabled', false);
     
                    /*
        show validation error
                    */
                    if (typeof response.responseJSON.errors !== 'undefined') 
                    {
        let errors = response.responseJSON.errors;
        let descriptionValidation = "";
        if (typeof errors.description !== 'undefined') 
                        {
                            descriptionValidation = '<li>' + errors.description[0] + '</li>';
                        }
                        let nameValidation = "";
        if (typeof errors.name !== 'undefined') 
                        {
                            nameValidation = '<li>' + errors.name[0] + '</li>';
                        }
         
        let errorHtml = '<div class="alert alert-danger" role="alert">' +
            '<b>Validation Error!</b>' +
            '<ul>' + nameValidation + descriptionValidation + '</ul>' +
        '</div>';
        $("#error-div").html(errorHtml);        
    }
                }
            });
        }
 
alert('ok');