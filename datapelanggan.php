<select name="pelanggan" id="pelanggan" multiple style="padding: 10px;width: 100%;height: 300px;" onchange="pilihan()">
    <?php

      $dir = "data/pelanggan/";

      chdir($dir);

      array_multisort(array_map('filemtime', ($files = glob("*.{json}", GLOB_BRACE))), SORT_DESC, $files);

      $i = 1;

      foreach($files as $filename)
      {

        $jsonFile = file_get_contents($filename);

        $array = json_decode($jsonFile, true);

        ?>

        
      <option value ="<?php echo $array["idpel"] ?>"><?php echo $array["nama"] ?></option>

        <?php
          }  
        ?>
</select>