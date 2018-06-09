<?php

include_once "app/models/iModels.php";

    class FotosModel implements iModels
    {
        private $images;
        private $imagesMin;
        private $description;
        private $alt;
        private $title;
        private $content;
        
        function getContent()
        {
            return $this->content;
        }

        private function createImg($index)
        {
            return "<img " .
                    "class = \"image\" " .
                    "src = \"{$this->images[$index]}\" " .
                    "lowsrc = \"{$this->imagesMin[$index]}\" " .
                    "alt = \"{$this->alt[$index]}\" " .
                    "title = \"{$this->title[$index]}\" " .
                    "onclick = \"showImg($index)\"" .
                    ">";
        }

        private function createGalery($fotoInStr)
        {
            $this->content = "<table>";
            for ($i = 0; $i < count($this->images) / $fotoInStr; $i++)
            {
                $this->content .= "<tr>";
                for ($j = $i * $fotoInStr; $j < $fotoInStr * ($i + 1) && $j < count($this->images); $j++)
                $this->content .= "<td class = \"foto\">" . $this->createImg($j) . "</td>"; 
                $this->content .= "</tr><tr>";
                for ($j = $i * $fotoInStr; $j < $fotoInStr * ($i + 1) && $j < count($this->images); $j++)
                    $this->content .= "<td class = \"description\"> {$this->description[$j]} </td>";
                $this->content .= "</tr>";
            }
            $this->content .= "</table>";
        }

        function __construct($fotoInStr)
        {
            $imgPath = "assets/img/";
            $this->images = 
            [
                "owl.jpg",
				"owl1.jpg",
				"owl2.jpg",
				"owl3.jpg",
				"owl4.jpeg",
				"owl5.jpg",
				"owl6.jpeg",
				"owl7.jpeg",
				"owl8.jpeg",
				"owl9.jpg",
				"owl10.jpg",
				"owl11.jpg",
				"owl12.jpg",
				"owl13.jpg",
				"owl14.jpeg"
            ];
            $this->imagesMin =
            [
                "owl-min.jpg",
				"owl1-min.jpg",
				"owl2-min.jpg",
				"owl3-min.jpg",
				"owl4-min.jpeg",
				"owl5-min.jpg",
				"owl6-min.jpeg",
				"owl7-min.jpeg",
				"owl8-min.jpeg",
				"owl9-min.jpg",
				"owl10-min.jpg",
				"owl11-min.jpg",
				"owl12-min.jpg",
				"owl13-min.jpg",
				"owl14-min.jpeg"
            ];
            $this->description = [];
            $this->alt = [];
            $this->title = [];
            for ($i = 0; $i < count($this->images); $i++)
            {
                $this->images[$i] = $imgPath . $this->images[$i];
                $this->imagesMin[$i] = $imgPath . $this->imagesMin[$i];
                $this->description[$i] = "Рисунок " . ($i + 1) . " - Сова";
                $this->alt[$i] = "Это сова";
                $this->title[$i] = "Сова";
            }
            $this->createGalery($fotoInStr);
        }
    }
?>