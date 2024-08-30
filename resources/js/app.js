import './bootstrap';
// import jquery
import Alpine from 'alpinejs'
import Chart from 'chart.js/auto';
import $ from 'jquery';
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';


window.jQuery = window.$ = $
Alpine.start();
window.Alpine = Alpine;
window.Chart = Chart;
window.Swiper = Swiper;
