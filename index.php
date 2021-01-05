<?php

    include "logic.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid 19 Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/regular.min.css" integrity="sha512-rVrbAp27ffQyFnzJ/aC5fZv9JgvL6cdB4zsL5HmM+DhJdzThc/F//62SJF+CaGiOZTP35e1p8JGcc+zRRVuhRw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/solid.min.css" integrity="sha512-SazV6tF6Ko4GxhyIZpKoXiKYndqzh7+cqxl9HDH7DGSpjkCN3QLqTAlhJHJnKxu3/2rfCsltzwFC4CmxZE1hPg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/brands.min.css" integrity="sha512-D0B6cFS+efdzUE/4wh5XF5599DtW7Q1bZOjAYGBfC0Lg9WjcrqPXZto020btDyrlDUrfYKsmzFvgf/9AB8J0Jw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">

</head>
<body>
    

    <div class="container-fluid bg-light p-5 text-center my-3">
    
        <h1>Covid 19 Tracker <img src="https://static.thenounproject.com/png/3349759-200.png" alt=""> </h1>
        <h5 class="text-muted">open source app to fetch coronavirus statics around the world</h5>
    </div>


        <div class="container my-5">       
            <div class="row text-center">
               <div class="col-4 text-warning">
                    <h5>All Cases</h5> <?php echo number_format($total_cases) ?>
                </div>

                <div class="col-4 text-danger">
                    <h5>Deaths</h5> <?php echo number_format($total_deaths) ?>
                </div>
                <div class="col-4 text-success">
                    <h5>Recoverd</h5> <?php echo number_format($total_recovered) ?>
                </div>
            </div>
        </div>

            <div class="container">
            
                <div class="mb-3">
                    <input type="text" class="form-control"  id="search" placeholder="Search any Country...">
                </div>
            
            </div>


    <div class="container-fluid our-table">
    
        <div class="table-responsive">
        
            <table class="table">
            <thead  class="thead-dark">
                <tr>
                <th scope="col">Countries</th>
                <th scope="col">All Cases</th>
                <th scope="col">Deaths</th>
                <th scope="col">Recoverd</th>
                </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                
                    foreach($data as $key => $value){  // key is coutries , value is data inside countries

                        $increased  = $value[$dayCount]['confirmed'] - $value[$dayCountPrev]['confirmed'];
                        $increased_death = $value[$dayCount]['deaths']-$value[$dayCountPrev]['deaths'];
                        $increased_recovered = $value[$dayCount]['recovered']-$value[$dayCountPrev]['recovered'];
                ?>

                    <tr>
                        
                        <th> <?php echo $key; ?> </th>

                        <td>
                            <?php echo number_format($value[$dayCount]['confirmed']); ?> 
                            <?php if($increased !=0 ) {?>
                                <small class="text-warning pl-3"><i class="fas fa-arrow-up"></i></small> <?php echo $increased ?>
                            <?php  } ?>
                        </td>
                        <td>
                            <?php echo number_format($value[$dayCount]['deaths']); ?>
                            <?php if($increased_death !=0 ) {?>
                                <small class="text-danger pl-3"><i class="fas fa-arrow-up"></i></small><?php echo $increased_death ?> 
                            <?php  } ?>


                        </td>     
                        <td>
                            <?php echo number_format($value[$dayCount]['recovered']); ?> 
                            <?php if($increased_recovered !=0 ) {?>
                                <small class="text-success pl-3"><i class="fas fa-arrow-up"></i></small> <?php echo $increased_recovered ?>
                            <?php  } ?>
                        </td>         
                    </tr>        


                <?php } ?>
            </tbody>
        </table>

        

        </div>

    </div>

    <footer class="footer mt-auto py-2 bg-light text-center">
        <div class="container">
            <span class="text-muted">Copyright &copy;2020, <a href="https://github.com/alalamyofficial">Mo Alalamy</a>  </span>
        </div>
    </footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/regular.min.js" integrity="sha512-n3lyI+8hlPaX2YoSywJxVwUWQeeCdksCdawZBaymlzL5YvWIeD4RCG1s9EF2PxGYrpJoC//ns1/O/KWAfa/vjg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/solid.min.js" integrity="sha512-JkeOaPqiSsfvmKzJUsqu7j2fv0KSB6Yqb1HHF0r9FNzIsfGv+zYi4h4jQKOogf10qLF3PMZEIYhziCEaw039tQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/fontawesome.min.js" integrity="sha512-kI12xOdWTh/nL2vIx5Yf3z/kJSmY+nvdTXP2ARhepM/YGcmo/lmRGRttI3Da8FXLDw0Y9hRAyZ5JFO3NrCvvXA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/v4-shims.min.js" integrity="sha512-fBnQ7cKP6HMwdVNN5hdkg0Frs1NfN7dgdTauot35xVkdhkIlBJyadHNcHa9ExyaI2RwRM7sBhoOt4R8W6lloBw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


</body>
</html>
