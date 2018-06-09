<?php

include "app/models/iModels.php";

    class MyInterestsModel implements iModels
    {
        private $data;
        private $paragraphs;
        private $content;

        function getContent()
        {
            return $this->content;
        }

        private function createParagraph($parag)
        {
            return "<h3>".$parag."</h3>";
        }

        private function createList()
        {
            $args = func_get_args();
            $content = "<ol>";
            foreach ($args as $val)
                $content .= "<li>".$val."</li>";
            return $content."</ol>";
        }

        private function linkToChapters()
        {
            return "<a href = \"#chapters\"><p>Наверх</p></a><hr class = \"rama\">";
        }

        private function createLists()
        {
            $this->content = 
            [
                "myHobbies"    => 
                    $this->createParagraph($this->paragraphs[0]).$this->createList(
                        $this->data[0][0],
                        $this->data[0][1],
                        $this->data[0][2],
                        $this->data[0][3]
                    ).$this->linkToChapters(),
                "books"        =>
                    $this->createParagraph($this->paragraphs[1]).$this->createList(
                        $this->data[1][0],
                        $this->data[1][1],
                        $this->data[1][2],
                        $this->data[1][3],
                        $this->data[1][4],
                        $this->data[1][5],
                        $this->data[1][6],
                        $this->data[1][7],
                        $this->data[1][8]
                    ).$this->linkToChapters(),
                "musics"       =>
                    $this->createParagraph($this->paragraphs[2]).$this->createList(
                        $this->data[2][0],
                        $this->data[2][1],
                        $this->data[2][2],
                        $this->data[2][3],
                        $this->data[2][4],
                        $this->data[2][5],
                        $this->data[2][6],
                        $this->data[2][7],
                        $this->data[2][8]
                    ).$this->linkToChapters(),
                "films"        =>
                    $this->createParagraph($this->paragraphs[3]).$this->createList(
                        $this->data[3][0],
                        $this->data[3][1],
                        $this->data[3][2],
                        $this->data[3][3],
                        $this->data[3][4],
                        $this->data[3][5],
                        $this->data[3][6],
                        $this->data[3][7],
                        $this->data[3][8]
                    ).$this->linkToChapters(),
                "games"        =>
                    $this->createParagraph($this->paragraphs[4]).$this->createList(
                        $this->data[4][0],
                        $this->data[4][1],
                        $this->data[4][2],
                        $this->data[4][3],
                        $this->data[4][4],
                        $this->data[4][5],
                        $this->data[4][6],
                        $this->data[4][7],
                        $this->data[4][8]
                    ).$this->linkToChapters()
            ];
        }

        function __construct()
        {
            $this->paragraphs = 
            [
                "мои увлечения.", 
                "мои любимые книги.", 
                "моя любимая музыка.", 
                "мои любимые фильмы.", 
                "мои любимые компьютерные игры." 
            ];
            $this->data = 
            [
                [
                    "Аниме", 
                    "Программирование", 
                    "Чтение", 
                    "Катание на велосипеде"
                ],
                [
                    "Рожденные туманом", 
                    "Песнь \"Льда и Пламени\"", 
                    "Мы", 
                    "Дивный новый мир", 
                    "Дом в 1000 этажей", 
                    "Обреченное королевство", 
                    "И не осталось никого", 
                    "Ящик Пандоры", 
                    "Правила рыцаря солнца"
                ],
                [
                    "PowerWolf", 
                    "Miracle of sound", 
                    "Amarante", 
                    "Helenstorm", 
                    "Rammstein", 
                    "Lindsey Stirling",
                    "Король и шут",
                    "Aqua",
                    "и др."
                ],
                [
                    "Стражи галактики vol.1",
                    "Стражи галактики vol.2",
                    "Тор: Рагнарек",
                    "Оно",
                    "Человек-паук: Взвращение домой",
                    "Трансформеры: Последний рыцарь",
                    "Темная башня",
                    "Логан",
                    "Призрак в доспехах"
                ],
                [
                    "Dark Souls: Prepare to die edition",
                    "Dark Souls II: Scholar of the first sin",
                    "Dark Souls III",
                    "Grim Down",
                    "Borderlands 2",
                    "Borderlands: The pre-sequel",
                    "Sins of solar empire",
                    "Civilization V: Brave new world",
                    "Civilization: Beyond earth"
                ]
            ];
            $this->createLists();
        }
    }
?>