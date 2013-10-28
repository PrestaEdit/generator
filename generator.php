<div class="columns">
	<h3><i class="icon-code"></i> Générateur de module (v0.2)</h3>
	<p>
		Générer les gabarits de vos modules PrestaShop en remplissant ce formulaire avec les informations adéquates.
	</p>
</div>

<hr />

<div id="wizard" class="swMain cRform">
	
  <ul>
    <li>
    	<a href="#step-1">
          <label class="stepNumber">1</label>
          <span class="stepDesc">
             Etape 1<br />
             <small>Informations générales</small>
          </span>
      </a>
    </li>
    <li>
      <a href="#step-2">
          <label class="stepNumber">2</label>
          <span class="stepDesc">
             Etape 2<br />
             <small>Structure du module</small>
          </span>
      </a>
    </li>
    <li>
      <a href="#step-3">
          <label class="stepNumber">3</label>
          <span class="stepDesc">
             Etape 3<br />
             <small>Hooks</small>
          </span>
      </a>
    </li>
  </ul>

  <?php include('generator-step1.php'); ?>
  <?php include('generator-step2.php'); ?>
  <?php include('generator-step3.php'); ?>

</div>

<!--
<p>
	<button class="btn btn-danger" name="submit" type="input"><i class="icon-download-alt icon-large"></i> Générer</button>
</p>
-->