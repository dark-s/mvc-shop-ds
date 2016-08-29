<?php

class Pagination
{
    //Максимальное выводимое количество ссылок на странице
    private $max = 10;

    //Ключ GET с номером страницы
    private $index = 'page';

    //Текущая страница
    private $current_page;

    //Общее количество записей
    private $total;

    //Записей на страницу
    private $limit;

    /*
     * Запуск необходимых данных для навигации
     * @param int $total - общее кол-во записей
     * @param int $limit - количество записей на страницу
     *
     * @return
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        //Устанавливаем общее кол-во записей
        $this->total = $total;

        //Устанавливаем кол-во записей на страницу
        $this->limit = $limit;

        //Устанавливаем ключ в url
        $this->index = $index;

        //Устанавливаем кол-во страниц
        $this->amount = $this->amount();

        //Устанавливаем номер текущей страницы
        $this->setCurrentPage($currentPage);
    }

    /*
     * Для вывода ссылок
     *
     * @return HTML-код со ссылками навигации
     */
    public function get()
    {
        //Для записи ссылок
        $links = null;

        //Ограничение цикла
        $limits = $this->limits();


        $html = '<ul class="pagination">';
        //Генерируем ссылки
        for($page = $limits[0]; $page <= $limits[1]; $page++){
            //Если текущая страница, добавляется класс active и убирается ссылка
            if($page == $this->current_page){
                $links .= '<li><a class="active">'.$page.'</a></li>';
            } else {
                //Иначе генерируем ссылку
                $links .= $this->generateHtml($page);
            }
        }

        if(!is_null($links)){
            //Если текущая страница не первая
            if($this->current_page > 1){
                //Создаем ссылку на первую страницу
                $links = $this->generateHtml(1, '&lt;') . $links;
            }

            //Если текущая страница не последняя
            if($this->current_page < $this->amount){
                //Создаем ссылку на последнюю
                $links .= $this->generateHtml($this->amount, '&gt;');
            }

            $html .= $links . '</ul>';

            //Возвращаем $html
            return $html;
        }
    }

    /*
     * Для генерации HTML-кода ссылки
     * @param int $page - номер страницы
     *
     * @return
     */
    private function generateHtml($page, $text = null)
    {
        //Если текст ссылки не указан
        if(!$text){
            //Указываем, что текст  - цифра страницы
            $text = $page;
        }

        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
        //Формируем HTML-код ссылки и возвращаем
        return '<li><a href="'.$currentURI.$this->index.$page.'">'.$text.'</a></li>';
    }

    /**
     *  Для получения, откуда стартовать
     *
     * @return массив с началом и концом отсчёта
     */
    private function limits()
    {
        // Вычисляем ссылки слева (чтобы активная ссылка была посередине)
        $left = $this->current_page - ceil($this->max / 2);

        // Вычисляем начало отсчёта
        $start = $left > 0 ? $left : 1;

        // Если впереди есть как минимум $this->max страниц
        if ($start + $this->max <= $this->amount)
            // Назначаем конец цикла вперёд на $this->max страниц или просто на минимум
            $end = $start > 1 ? $start + $this->max : $this->max;
        else {
            // Конец - общее количество страниц
            $end = $this->amount;

            // Начало - минус $this->max от конца
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }

        // Возвращаем
        return
            array($start, $end);
    }

    /**
     * Для установки текущей страницы
     *
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        # Получаем номер страницы
        $this->current_page = $currentPage;

        # Если текущая страница боле нуля
        if ($this->current_page > 0) {
            # Если текунщая страница меньше общего количества страниц
            if ($this->current_page > $this->amount)
                # Устанавливаем страницу на последнюю
                $this->current_page = $this->amount;
        } else
            # Устанавливаем страницу на первую
            $this->current_page = 1;
    }

    /**
     * Для получеия общего числа страниц
     *
     * @return число страниц
     */
    private function amount()
    {
        // Делим и возвращаем
        return ceil($this->total / $this->limit);
    }
}