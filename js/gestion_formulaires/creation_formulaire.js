jQuery(function($) {  
    //Form options
    var options = {
      i18n: {
        locale: 'fr-FR'
      },
      
      showActionButtons: false 
    };

    //Build form
    var fbEditor = document.getElementById('build-wrap');
    var formBuilder = $(fbEditor).formBuilder(options);

    // Clear form
    document.getElementById('clear_form').onclick = function() {
      formBuilder.actions.clearFields();
    }; 

    //Form fields to HTML
    document.getElementById('save_form').addEventListener('click', function() {

      var escapeEl = document.createElement('textarea'),
      code = document.getElementById('markup'),
      escapeHTML = function(html) {
        escapeEl.textContent = html;
        return escapeEl.innerHTML;
      },
      formData =formBuilder.actions.getData('json') ,
      addLineBreaks = function(html) {
        return html.replace(new RegExp('&gt; &lt;', 'g'), '&gt;\n&lt;').replace(new RegExp('&gt;&lt;', 'g'), '&gt;\n&lt;');
      };
      
      var $markup = $('<div/>');
      $markup.formRender({formData});
      code.innerHTML = addLineBreaks(escapeHTML($markup[0].innerHTML));

      var champs = "<form id=\"idform\">"+$("#markup").text()+"</form>" ;

      //Save form using ajax to db

      swal({
          title: "Donnez un nom significative à votre formulaire",
          text: "Entrez le nom du formulaire",
          type: "input",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Enregistrer",
          cancelButtonText: "Annuler",
          animation: "slide-from-top",
          inputPlaceholder: "...",
          showLoaderOnConfirm: true,
        }, function (inputValue) {
          if (inputValue === false) return false;
          if (inputValue === "") {
            swal.showInputError("Entrez le nom"); 
            return false;
          }
          $.ajax({
            url: '../../php/add_form.php',
            type: 'POST',
            data: { 'formText':champs , 'nom_form': inputValue },
            success: function(response) {
              console.log("reponse"+response);
              if(response==1){
                swal("C'est fait! ", "Un nouveau formulaire a été ajouté", "success");
                $("#form_add_zonefac").trigger("reset");
                $("#submitButton_add").html('Sauvegarder');
              } 
              else if(response==0){
                swal.showInputError("Le nom que vous avez introduisez existe déjà! Réessayer avec un autre!"); 

              }
              else{
                swal("ERREUUUUUUR", "Something's not rightttt", "error");
              }
            } 
          });
        });

    $("#markup").html("");
  });
});
