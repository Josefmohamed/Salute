//import blocks
import {headerBlock} from "./headerBlock";
import {footerBlock} from './footerBlock';
import {hero_block} from './hero_block';
import {get_in_touch_block} from './get_in_touch_block';
import {our_vision_block} from './our_vision_block';
import {service_feature_block} from './service_feature_block';
import {faqs_block} from './faqs_block';
import {services_block} from './services_block';
import {testimonials_block} from './testimonials_block';
import {blogs_block} from './blogs_block';
import {about_us_block} from './about_us_block';
import {why_join_salute_block} from './why_join_salute_block';
import {what_we_offer_block} from './what_we_offer_block';
import {page_not_found} from './page_not_found';
import {join_salute_block} from './join_salute_block';
import {hiring_block} from './hiring_block';

export function indexBlocks() {
  headerBlock()
  hero_block()
  footerBlock()
  get_in_touch_block()
  our_vision_block()
  service_feature_block()
  faqs_block()
  testimonials_block()
  services_block()
  about_us_block()
  blogs_block()
  why_join_salute_block()
  what_we_offer_block()
  page_not_found()
  join_salute_block()
  hiring_block()
}

