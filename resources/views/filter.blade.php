<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wildmeat App</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="col-lg-4">
        <h2>Taxon</h2>
        <form method="POST">
          <div class="form-group">
            <label for="">Kingdom</label>
            <select  name="kingdom" id="kingdom" class='taxo form-control' data-trigger='phylum'>
                <option value=''>- Kingdom -</option>
                @foreach ($kingdom as $idx => $row)
                  <option value="{{ $row->id }}">{{ $row->kingdom_name }}</option>
                @endforeach
            </select>
          </div>

          

          

          <div class="form-group">
            <label for="">Phylum</label>
            <select  name="phylum_name" id="phylum" class='taxo form-control' data-trigger='class'>
           
              <option value="" disable="true" selected="true"></option>
            
            </select>
          </div>

          <div class="form-group">
            <label for="">Class</label>
            
            <select  name="class_name" id="class" class='taxo form-control' data-trigger='order'>
              <option value="0" disable="true" selected="true">Select Class</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Order</label>
            <select  name="order_name" id="order" class='taxo form-control' data-trigger='familia'>
              <option value="0" disable="true" selected="true">Select Order</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Familia</label>
            <select  name="familia_name" id="familia" class='taxo form-control' data-trigger='genus'>
              <option value="0" disable="true" selected="true">=== Select Familia ===</option>
            </select>
            </div>

            <div class="form-group">
            <label for="">Genus</label>
            <select  name="genus_name" id="genus" class='taxo form-control' data-trigger='species'>
              <option value="0" disable="true" selected="true">=== Select Genus ===</option>
            </select>
          </div>


          <div class="form-group">
            <label for="">Species</label>
            <select  name="species_name" id="species"  class='  form-control'>
              <option value="0" disable="true" selected="true">=== Select Species ===</option>
            </select>
          </div>



        </form>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    

    <script type="text/javascript">
      function triggerEvent(el){
        var trigger = $(el).data('trigger');
        if(typeof trigger != 'undefined' ){
          $.get("get_" + trigger + "_by_parent/" + $(el).val(), function(res) {
            $("#" + trigger).html("");

            $.each(res.data, function(idx, val){
              $("#" + trigger).append("<option value='" + val.id +"'>" + val.name + "</option>")
            })
          }).done(function(){
            triggerEvent($("#" + trigger));
          });

        }
      }

      $(function(){
        $(".taxo").on('change', function(){
          triggerEvent($(this));
        })


      })
      /*
      $('#kingdom').on('change', function(e){
        console.log(e);
        var kingdom_name = e.target.value;
        $.get('/json-kingdom?kingdom_id=' + kingdom_id,function(data) {
          console.log(data);
          
          $('#kingdom').append('<option value="0" disable="true" selected="true">=== Select Phylum ===</option>');

          $('#class').empty();
          $('#class').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

          $('#order').empty();
          $('#order').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

          $.each(data, function(index, regenciesObj){
            $('#phylum').append('<option value="'+ phylumObj.id +'">'+ phylum.name +'</option>');
          })
        });
      });

      $('#phylum').on('change', function(e){
        console.log(e);
        var phylum_id = e.target.value;
        $.get('/json-phylum?phylum_name=' + phylum_id,function(data) {
          console.log(data);
          $('#class').empty();
          $('#class').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

          $.each(data, function(index, districtsObj){
            $('#class').append('<option value="'+ classObj.id +'">'+ classObj.name +'</option>');
          })
        });
      });

      $('#districts').on('change', function(e){
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id,function(data) {
          console.log(data);
          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

          $.each(data, function(index, villagesObj){
            $('#villages').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
          })
        });
      });
  */

    </script>

  </body>
</html>