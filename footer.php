<link rel="stylesheet" type="text/css" href="css/footer.css"/>

<footer class="footer-distributed">

  <div class="footer-left">
    <p class="footer-links">
      <a href='accueil.php'>Accueil</a>
      ·
      <a href='forum.php'>Forum</a>
      ·
      <a data-toggle='modal' href='#comingSoon'>A propos</a>
      ·
      <a data-toggle='modal' href='#comingSoon'>Contact</a>
    </p>
    <p class="footer-company-name">EPSI &copy; 2018</p>
  </div>

  <div class="footer-center">

    <div>
      <i class="fa fa-map-marker"></i>
      <p><span>17 Rue du Sgt M. Berthet</span>Lyon, France</p>
    </div>

    <div>
      <i class="fa fa-phone"></i>
      <p>+334 72 85 38 50</p>
    </div>

    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="mailto:info@lyon-epsi.fr">info@lyon-epsi.fr</a></p>
    </div>

  </div>

  <div class="footer-right">

    <p class="footer-company-about">
      <span>A propos de l'EPSI :</span>
      Première école d’informatique en France,
      première à avoir obtenu le titre niveau I RNCP (Bac+5 certifié par l’État) et résolument engagée auprès des entreprises,
    </p>

    <div class="footer-icons">
      <a data-toggle='modal' href='#comingSoon'><i class="fa fa-facebook"></i></a>
      <a data-toggle='modal' href='#comingSoon'><i class="fa fa-twitter"></i></a>
      <a data-toggle='modal' href='#comingSoon'><i class="fa fa-linkedin"></i></a>
    </div>

  </div>

</footer>




</div>
</div>


<!-- Modal coming soon -->
<div data-show="false" class="modal" id="comingSoon" role="dialog">

  <div class="modal-dialog">
    <form method="POST" class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">A venir</h4>
      </div>

      <div class="modal-body">
        <p style='text-align: center;'>Cette fonctionnalité n'est pas encore disponible !</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>

    </form>
  </div>

</div>


<script>
  $(document).ready(function(){
    $(".modal").modal();
  });
</script>

<script>
  $('.special.modal')
  .modal({
    centered: false
  })
  .modal('show')
  ;
</script>

</body>
</html>
