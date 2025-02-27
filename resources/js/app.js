import './bootstrap';
// import jquery
import "/node_modules/select2/dist/css/select2.css";

import Alpine from 'alpinejs'
import Chart from 'chart.js/auto';
import $ from 'jquery';
import Swiper from 'swiper/bundle';
import { CountUp } from 'countup.js';
import Sortable from 'sortablejs';
import select2 from 'select2';

// import styles bundle
import 'swiper/css/bundle';


window.jQuery = window.$ = $
Alpine.start();
window.Alpine = Alpine;
window.Chart = Chart;
window.Swiper = Swiper;
window.CountUp = CountUp;
window.Sortable = Sortable;
select2();