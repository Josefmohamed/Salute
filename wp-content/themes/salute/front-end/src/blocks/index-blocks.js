//import blocks
import {headerBlock} from "./headerBlock";
import {footerBlock} from './footerBlock';
import {hero_block} from './hero_block';
import {get_in_touch_block} from './get_in_touch_block';
import {our_vision_block} from './our_vision_block';
import {service_feature_block} from './service_feature_block';
import {faqs_block} from './faqs_block';

export function indexBlocks() {
  headerBlock()
  hero_block()
  footerBlock()
  get_in_touch_block()
  our_vision_block()
  service_feature_block()
  faqs_block()
}

