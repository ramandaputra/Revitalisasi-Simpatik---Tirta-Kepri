/* ===================================================
 * bootstrap-transition.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#transitions
 * ===================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


  /* CSS TRANSITION SUPPORT (http://www.modernizr.com/)
   * ======================================================= */

  $(function () {

    $.support.transition = (function () {

      var transitionEnd = (function () {

        var el = document.createElement('bootstrap')
          , transEndEventNames = {
               'WebkitTransition' : 'webkitTransitionEnd'
            ,  'MozTransition'    : 'transitionend'
            ,  'OTransition'      : 'oTransitionEnd otransitionend'
            ,  'transition'       : 'transitionend'
            }
          , name

        for (name in transEndEventNames){
          if (el.style[name] !== undefined) {
            return transEndEventNames[name]
          }
        }

      }())

      return transitionEnd && {
        end: transitionEnd
      }

    })()

  })

}(window.jQuery);/* ==========================================================
 * bootstrap-alert.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#alerts
 * ==========================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


 /* ALERT CLASS DEFINITION
  * ====================== */

  var dismiss = '[data-dismiss="alert"]'
    , Alert = function (el) {
        $(el).on('click', dismiss, this.close)
      }

  Alert.prototype.close = function (e) {
    var $this = $(this)
      , selector = $this.attr('data-target')
      , $parent

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
    }

    $parent = $(selector)

    e && e.preventDefault()

    $parent.length || ($parent = $this.hasClass('alert') ? $this : $this.parent())

    $parent.trigger(e = $.Event('close'))

    if (e.isDefaultPrevented()) return

    $parent.removeClass('in')

    function removeElement() {
      $parent
        .trigger('closed')
        .remove()
    }

    $.support.transition && $parent.hasClass('fade') ?
      $parent.on($.support.transition.end, removeElement) :
      removeElement()
  }


 /* ALERT PLUGIN DEFINITION
  * ======================= */

  var old = $.fn.alert

  $.fn.alert = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('alert')
      if (!data) $this.data('alert', (data = new Alert(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  $.fn.alert.Constructor = Alert


 /* ALERT NO CONFLICT
  * ================= */

  $.fn.alert.noConflict = function () {
    $.fn.alert = old
    return this
  }


 /* ALERT DATA-API
  * ============== */

  $(document).on('click.alert.data-api', dismiss, Alert.prototype.close)

}(window.jQuery);/* ============================================================
 * bootstrap-button.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#buttons
 * ============================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */


!function ($) {

  "use strict"; // jshint ;_;


 /* BUTTON PUBLIC CLASS DEFINITION
  * ============================== */

  var Button = function (element, options) {
    this.$element = $(element)
    this.options = $.extend({}, $.fn.button.defaults, options)
  }

  Button.prototype.setState = function (state) {
    var d = 'disabled'
      , $el = this.$element
      , data = $el.data()
      , val = $el.is('input') ? 'val' : 'html'

    state = state + 'Text'
    data.resetText || $el.data('resetText', $el[val]())

    $el[val](data[state] || this.options[state])

    // push to event loop to allow forms to submit
    setTimeout(function () {
      state == 'loadingText' ?
        $el.addClass(d).attr(d, d) :
        $el.removeClass(d).removeAttr(d)
    }, 0)
  }

  Button.prototype.toggle = function () {
    var $parent = this.$element.closest('[data-toggle="buttons-radio"]')

    $parent && $parent
      .find('.active')
      .removeClass('active')

    this.$element.toggleClass('active')
  }


 /* BUTTON PLUGIN DEFINITION
  * ======================== */

  var old = $.fn.button

  $.fn.button = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('button')
        , options = typeof option == 'object' && option
      if (!data) $this.data('button', (data = new Button(this, options)))
      if (option == 'toggle') data.toggle()
      else if (option) data.setState(option)
    })
  }

  $.fn.button.defaults = {
    loadingText: 'loading...'
  }

  $.fn.button.Constructor = Button


 /* BUTTON NO CONFLICT
  * ================== */

  $.fn.button.noConflict = function () {
    $.fn.button = old
    return this
  }


 /* BUTTON DATA-API
  * =============== */

  $(document).on('click.button.data-api', '[data-toggle^=button]', function (e) {
    var $btn = $(e.target)
    if (!$btn.hasClass('btn')) $btn = $btn.closest('.btn')
    $btn.button('toggle')
  })

}(window.jQuery);/* ==========================================================
 * bootstrap-carousel.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#carousel
 * ==========================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


 /* CAROUSEL CLASS DEFINITION
  * ========================= */

  var Carousel = function (element, options) {
    this.$element = $(element)
    this.$indicators = this.$element.find('.carousel-indicators')
    this.options = options
    this.options.pause == 'hover' && this.$element
      .on('mouseenter', $.proxy(this.pause, this))
      .on('mouseleave', $.proxy(this.cycle, this))
  }

  Carousel.prototype = {

    cycle: function (e) {
      if (!e) this.paused = false
      if (this.interval) clearInterval(this.interval);
      this.options.interval
        && !this.paused
        && (this.interval = setInterval($.proxy(this.next, this), this.options.interval))
      return this
    }

  , getActiveIndex: function () {
      this.$active = this.$element.find('.item.active')
      this.$items = this.$active.parent().children()
      return this.$items.index(this.$active)
    }

  , to: function (pos) {
      var activeIndex = this.getActiveIndex()
        , that = this

      if (pos > (this.$items.length - 1) || pos < 0) return

      if (this.sliding) {
        return this.$element.one('slid', function () {
          that.to(pos)
        })
      }

      if (activeIndex == pos) {
        return this.pause().cycle()
      }

      return this.slide(pos > activeIndex ? 'next' : 'prev', $(this.$items[pos]))
    }

  , pause: function (e) {
      if (!e) this.paused = true
      if (this.$element.find('.next, .prev').length && $.support.transition.end) {
        this.$element.trigger($.support.transition.end)
        this.cycle(true)
      }
      clearInterval(this.interval)
      this.interval = null
      return this
    }

  , next: function () {
      if (this.sliding) return
      return this.slide('next')
    }

  , prev: function () {
      if (this.sliding) return
      return this.slide('prev')
    }

  , slide: function (type, next) {
      var $active = this.$element.find('.item.active')
        , $next = next || $active[type]()
        , isCycling = this.interval
        , direction = type == 'next' ? 'left' : 'right'
        , fallback  = type == 'next' ? 'first' : 'last'
        , that = this
        , e

      this.sliding = true

      isCycling && this.pause()

      $next = $next.length ? $next : this.$element.find('.item')[fallback]()

      e = $.Event('slide', {
        relatedTarget: $next[0]
      , direction: direction
      })

      if ($next.hasClass('active')) return

      if (this.$indicators.length) {
        this.$indicators.find('.active').removeClass('active')
        this.$element.one('slid', function () {
          var $nextIndicator = $(that.$indicators.children()[that.getActiveIndex()])
          $nextIndicator && $nextIndicator.addClass('active')
        })
      }

      if ($.support.transition && this.$element.hasClass('slide')) {
        this.$element.trigger(e)
        if (e.isDefaultPrevented()) return
        $next.addClass(type)
        $next[0].offsetWidth // force reflow
        $active.addClass(direction)
        $next.addClass(direction)
        this.$element.one($.support.transition.end, function () {
          $next.removeClass([type, direction].join(' ')).addClass('active')
          $active.removeClass(['active', direction].join(' '))
          that.sliding = false
          setTimeout(function () { that.$element.trigger('slid') }, 0)
        })
      } else {
        this.$element.trigger(e)
        if (e.isDefaultPrevented()) return
        $active.removeClass('active')
        $next.addClass('active')
        this.sliding = false
        this.$element.trigger('slid')
      }

      isCycling && this.cycle()

      return this
    }

  }


 /* CAROUSEL PLUGIN DEFINITION
  * ========================== */

  var old = $.fn.carousel

  $.fn.carousel = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('carousel')
        , options = $.extend({}, $.fn.carousel.defaults, typeof option == 'object' && option)
        , action = typeof option == 'string' ? option : options.slide
      if (!data) $this.data('carousel', (data = new Carousel(this, options)))
      if (typeof option == 'number') data.to(option)
      else if (action) data[action]()
      else if (options.interval) data.pause().cycle()
    })
  }

  $.fn.carousel.defaults = {
    interval: 5000
  , pause: 'hover'
  }

  $.fn.carousel.Constructor = Carousel


 /* CAROUSEL NO CONFLICT
  * ==================== */

  $.fn.carousel.noConflict = function () {
    $.fn.carousel = old
    return this
  }

 /* CAROUSEL DATA-API
  * ================= */

  $(document).on('click.carousel.data-api', '[data-slide], [data-slide-to]', function (e) {
    var $this = $(this), href
      , $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) //strip for ie7
      , options = $.extend({}, $target.data(), $this.data())
      , slideIndex

    $target.carousel(options)

    if (slideIndex = $this.attr('data-slide-to')) {
      $target.data('carousel').pause().to(slideIndex).cycle()
    }

    e.preventDefault()
  })

}(window.jQuery);/* =============================================================
 * bootstrap-collapse.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#collapse
 * =============================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */


!function ($) {

  "use strict"; // jshint ;_;


 /* COLLAPSE PUBLIC CLASS DEFINITION
  * ================================ */

  var Collapse = function (element, options) {
    this.$element = $(element)
    this.options = $.extend({}, $.fn.collapse.defaults, options)

    if (this.options.parent) {
      this.$parent = $(this.options.parent)
    }

    this.options.toggle && this.toggle()
  }

  Collapse.prototype = {

    constructor: Collapse

  , dimension: function () {
      var hasWidth = this.$element.hasClass('width')
      return hasWidth ? 'width' : 'height'
    }

  , show: function () {
      var dimension
        , scroll
        , actives
        , hasData

      if (this.transitioning || this.$element.hasClass('in')) return

      dimension = this.dimension()
      scroll = $.camelCase(['scroll', dimension].join('-'))
      actives = this.$parent && this.$parent.find('> .accordion-group > .in')

      if (actives && actives.length) {
        hasData = actives.data('collapse')
        if (hasData && hasData.transitioning) return
        actives.collapse('hide')
        hasData || actives.data('collapse', null)
      }

      this.$element[dimension](0)
      this.transition('addClass', $.Event('show'), 'shown')
      $.support.transition && this.$element[dimension](this.$element[0][scroll])
    }

  , hide: function () {
      var dimension
      if (this.transitioning || !this.$element.hasClass('in')) return
      dimension = this.dimension()
      this.reset(this.$element[dimension]())
      this.transition('removeClass', $.Event('hide'), 'hidden')
      this.$element[dimension](0)
    }

  , reset: function (size) {
      var dimension = this.dimension()

      this.$element
        .removeClass('collapse')
        [dimension](size || 'auto')
        [0].offsetWidth

      this.$element[size !== null ? 'addClass' : 'removeClass']('collapse')

      return this
    }

  , transition: function (method, startEvent, completeEvent) {
      var that = this
        , complete = function () {
            if (startEvent.type == 'show') that.reset()
            that.transitioning = 0
            that.$element.trigger(completeEvent)
          }

      this.$element.trigger(startEvent)

      if (startEvent.isDefaultPrevented()) return

      this.transitioning = 1

      this.$element[method]('in')

      $.support.transition && this.$element.hasClass('collapse') ?
        this.$element.one($.support.transition.end, complete) :
        complete()
    }

  , toggle: function () {
      this[this.$element.hasClass('in') ? 'hide' : 'show']()
    }

  }


 /* COLLAPSE PLUGIN DEFINITION
  * ========================== */

  var old = $.fn.collapse

  $.fn.collapse = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('collapse')
        , options = $.extend({}, $.fn.collapse.defaults, $this.data(), typeof option == 'object' && option)
      if (!data) $this.data('collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.collapse.defaults = {
    toggle: true
  }

  $.fn.collapse.Constructor = Collapse


 /* COLLAPSE NO CONFLICT
  * ==================== */

  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }


 /* COLLAPSE DATA-API
  * ================= */

  $(document).on('click.collapse.data-api', '[data-toggle=collapse]', function (e) {
    var $this = $(this), href
      , target = $this.attr('data-target')
        || e.preventDefault()
        || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //strip for ie7
      , option = $(target).data('collapse') ? 'toggle' : $this.data()
    $this[$(target).hasClass('in') ? 'addClass' : 'removeClass']('collapsed')
    $(target).collapse(option)
  })

}(window.jQuery);/* ============================================================
 * bootstrap-dropdown.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#dropdowns
 * ============================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */


!function ($) {

  "use strict"; // jshint ;_;


 /* DROPDOWN CLASS DEFINITION
  * ========================= */

  var toggle = '[data-toggle=dropdown]'
    , Dropdown = function (element) {
        var $el = $(element).on('click.dropdown.data-api', this.toggle)
        $('html').on('click.dropdown.data-api', function () {
          $el.parent().removeClass('open')
        })
      }

  Dropdown.prototype = {

    constructor: Dropdown

  , toggle: function (e) {
      var $this = $(this)
        , $parent
        , isActive

      if ($this.is('.disabled, :disabled')) return

      $parent = getParent($this)

      isActive = $parent.hasClass('open')

      clearMenus()

      if (!isActive) {
        if ('ontouchstart' in document.documentElement) {
          // if mobile we we use a backdrop because click events don't delegate
          $('<div class="dropdown-backdrop"/>').insertBefore($(this)).on('click', clearMenus)
        }
        $parent.toggleClass('open')
      }

      $this.focus()

      return false
    }

  , keydown: function (e) {
      var $this
        , $items
        , $active
        , $parent
        , isActive
        , index

      if (!/(38|40|27)/.test(e.keyCode)) return

      $this = $(this)

      e.preventDefault()
      e.stopPropagation()

      if ($this.is('.disabled, :disabled')) return

      $parent = getParent($this)

      isActive = $parent.hasClass('open')

      if (!isActive || (isActive && e.keyCode == 27)) {
        if (e.which == 27) $parent.find(toggle).focus()
        return $this.click()
      }

      $items = $('[role=menu] li:not(.divider):visible a', $parent)

      if (!$items.length) return

      index = $items.index($items.filter(&∫focus'))
ä$    0)f!hm.ceyCM`Â == 38`&"`ynDe æ 0)†in¶%x--             "    ! (   ` `          ` // uy
      Èf ÆenouyCodu"== 4"&¶ index <"$ÈtemsÓle.gtH - 1)†i.tÂ¯++    ,"        0  " ††  (// doWn
(   !af (!~indEx) index = 0    " $it%mr
    0   .eq(iÓdex)
 " †$   .focÒsh)*  ! }
" }
 0fqnctoon"clearÕan5S(k {
    $('-drotDoun=backdro').reMOve(!
!†( $(toÁGlE).dish(Êwnkpaof h)0{
      eeTXarent(4this().b%mÔveClaSs'npeo&)
   })
 d}+
  function$getParent($dHks) 
  % Va2"Ûgmector } $|His.aTtr('dau!/targtt')
      , $paRent

    iv (!sedeC|/r) {
 ("   qflectkr =  pmis.!tÙr('hrdf')
Ä°   !selectob = selmctor &$Äk#/.uest(seÏeCtow)`.& selectgr.ReÒlake(/.™(?'[^\s]*,(/, %') //sÙÚi0!fÔr ie7  0 y
    X!Úent!= Ûele#tor &Ó $(s%|ector)
 † "i& (!∞arEnt |~ !4paRen4n|en'4h) `arenV = $thIÛoparent
 "  return $0abmnt
  }ã# /($DROPDGWŒ @LUGIN @EFKNhTION "(*(===?====Ω?==-?====<<===== */
!¥ˆas®old0}  .f|,`2opdown

 0$.fn.dropdown = functioj option( {ä   (vdt}‚n |jis.each(f7nctio~ ( ˚ `    ~cr`$This = $(tlk3)
"  `! ` ¨!data=$vhÈsNdatc™&tropdowj#!
      If†(!‰ata- 4t`is.daTa('droPdown', *dct` = omw†Droxdown(vHis))+  †   if (|yzeof optiof ?= 'ct2©.G%) datc[/ption]calÏ($Ùhis9
 !  |)0 m
  §.fn.drOpdowl.Cgnstb}ctor!= d6opdÓwn
ä /*0DSOPDMWN NO BOfDLICT( * Ω5======?=?====º===9 */

 "$.dl.drkp`ownnoConfhi„t = dunctMNn )) {
    $.fj.troptown < old
   (return this
 `}


"!7n QXPLY TO STANdARD DROPDOG^$ELEMELTS
   *!==<======}=====??==Ω=========5}=== *+
 !$(dkcemenˆ+
    .on(clicK/drgpdosn.davA-aPi', c(easMenus)
! 0 nn~('#licK.dpoxeowo>fata=ar}',('.d2.rdo7n fobm', functyo. (e) { Â.topPrÔaÁaTaon() }(
‡ p .mn('cl)ck,drmpdownÆdata-axig  , tkggle( Dpopdogf>pro|otype.toeell)
(.  .oÏ∏%keyeown.drgpdown&dctaa`i', uÔwgle" '`[zol%=-Ânt^'", Dr/pf-wn.prmtot˘te.kayt+wn)

}(Wi.tow.JQımsi+*/* ====Ω=====?=====<==}=======}==Ì==5========-=======-=}-=ä * bootstrap-modAl.ks t2.3.≤
†. http:/twbq.Cithub.com/bootstrap?zitascrmtv>Ht,l#mo`als * =<9º===?9=9>Ω=Ω=-=<=-========<-?},=?======?=Ω5=======-Ω j CyrighT 20q TwittuS Ins.`*
 * licuNigL unde‚*Ùhu Apqche \icdn3—, VersËon06.0( tja 2License"©;(* yku(meyjkt uÛe this &kLe except iN0complicnbe(wItË thg Laaense
 Æ YnU may ob‰amn !(cÔpy Of the"ÃicEnse a6
 *
`* ittt:&mwww.!xache/Org'dicensdsØLIcNSE-2.0
 " j Ull%ss requ)sed bi aPlika‚le$law or$aÁbaed to )n"wrating,!snftware
  DispributgL uÓter the†Lyc%Ns% is da{trmc}tÂd†on cn "AS ISb B¡SIC,ä0*bWITHOU W`RRA^TIeS O” cKNDI\I_^Q(OF ANY KHOD,!gkvher %xppgsq ov!implied.
 j See the"LAcense"fOr$vÍe spesific l!n«uaG% Áove`ji~g`pÂr}ÈsqmÔns and(
 limiuatioos w~dgV |le L)cense. *!==9=-=-}======}Ω====9=5==9==========?5=}=}ù========= *Ω

1&qnc4ion ($) {K
  btce stry't"2!// jhaot ;_;

 /* MODAL$CLASS DEFINiTIOFä" * ====π===-Ω9=======/|$*
!$vab MGdal = funkpimn (element( OppiojS) {
    hir>Ôp|ionR = kttioNs
  0`this.$element Ω $(eleent) % ( `*dglegate('[data-dis}is;=¢modal"]'- '„licondiSmi{s.mod`l&, $.`poii(t8is.yile, this))
    t(is/option3.remoTu && ~Ëic.$dmem%jt.nind(&.modalbfy'	nhae(thys.options*rEmkTm©""}

 $MnDal.ppouotypa = {
 `"   son{tructor: Modql

   !,†toggme* F}fsvion (! {	  ‡  *  return Vhis€!Ùhis/iˆShown = 'sho˜'%: 'h)da'](©`     

    $†ÛHov∫ &u.auioN (+"{
      $ vqr th`t = phis
 `   0 0 0,`E = $.EvenTh'siovg)
  `    0this.$elemenT.trigger(d)
ä "   "  in (thiq.is”hwn l| e.iSd≈gqeLpPrmvented(!® Úeturn       `this.isShown = trt%

 $     8thÌÛ.mscaxa()

      ™ vhas*backtvop(fu.ctioj ()`
        $ vaÚ trsn3ition=0$&Ûuppmr4.tranqÈtmon '& tiad.$element.haSCmass('fa‰E?)
        ) yf (!th·t.,eh%}en4æxaÚelt(9/eengtx)0{
   ` !°    `tjaT.$element.!ppendTodocummnt.bo x©$Ø/don't mowe modams fm p/siuio~
        ! }

& `  b    tLat.$eÏelejtsÈkw() † " $    kf (tra|siuion©†{
0 !0      $ vhav.4elemant[0M¶ofg3eTWidth /o force renlow
   0 "  ! }
J$        Ätxat.$elemenT
†   0  (    éaddClars('in')B   $ (    `†*attp(%aria-hideen'( f`lse) 
 `    ( ( thAp.enforceFocu[<©
* 0` ! !  tran3itiÁn ?!    0      that.$eleme.p.one($Æauppor4ÆdransidiOn.Mjd$ f}Ócti}n$() z |ha4.$eldmenp.Êoc}s(©.trhggerËosËown&)0}	 :ä            tj·t$$elE}en.&ocus¨).tri'cur)&siogn')ä0  `    })
0 $ 0 }

   !% hit‰; function$(e) {
  0"    e &f e.pz~ent@gfa}mt))
!  †    p`b t`a4 = Ù`is

  $ & † e =†$ÆE6En¥y'hidm')

     †  vÏis§elemenv.4Rmge!re)J  ) $d( if (!thm3.isShown |xe-)sDefi˜lÙPre~efdgd(9) RÂtubn

  ( ""  thir/isSh/wÓ = faNsÂ

   $" !$txis.eccaxe()

  "   †`$(doc5meNT+,ffh'fo‚usin.modal#) !0     thiS.$ElumenT
( ` !  ! .2eMovmCl!Ûs('in')
 $    $   aÙtr('arka-hid`a.', tzue)
J   `!  %.suppobt.transytiol &' `his.dengment.hasCnass(ggqde')0?
  `00   ! this.hideWauh\raÓsmtinn ) :
   !  `   ti+q.hkÙeModalh	
      }

 4 ", enfbceFo#uc:4funcTion (1 {
 "      var Th`t =this
  "     $(focumalt).on('focuÛÈ>.mgd1l', f5/cpion (e) {* 8&   0$  if (th·t.$mlement[0] !±= e.|crget`&¶!tjat.$elament.hesh%.uabget).lelf|h) {ä  "  * `!   t(Qt.,eneleotÆfocqs()
0    " "  }
 ! " †  m)
      }
!"  < askapd2!fıncvimn"() {
  `    $ˆar |hAt = ThiS
     `! if (thaq.IsC(ow. && this.ortions.kEyboard) 
   !(   " this.delEment.on('c%yup/dmsiÈss.Modal',†funct#on ( e`9 {
            e,Which == 27 $& tHathi!eh)
         (m)
    (a (} ƒlse Id(8!thi{.is”ho7n) ~
 " 0     this.$elemeot.ogfh#odyup.disei3c,mÔ`!(')
   p    }à∞  !  }
"   , H)deWiu`‘rajsition: fufBtiGn (8 z
   `    vqr th`u(- dhis
     $ 4  ,(uiIeqÙ < s%tT)meowtftjÎtikn!(-({
$    (" `  "† that.$Âleidft.off($.supqort.trAnsqtion.end+
      0     ∞ thadnhI`eModefa)
 r `        }, 500)    ) % thÈs$gldment.one(.support.tˆ!nsitiof.un ¨ funbuil () {
  `   0   wmearUimeout(\ymeout)
 !0  *  1 Ùhct.hi`eMo‰am()
 `0    })
   * }
! $ < hideModam> funct)gn (- {
# (0"   tar§tËct = thaÛä    0  `tlis*$elÂmenthade((
     ( 0vÎisn`ackdsop(nenctIon 9)$z
   ‡   ¢† that>bemoveBackdvo()
  !    "  th¡4/elemaÓt.tsi%wer'hIdden*)
 !!     ]!
$   $ }

   ",∞remo~eBackdp/p: dUnGtiof†h) sä   "  † this.$bacidrop &f!4hyr.$ba„Î`rop¨r≈onve(
  (    $thIÒ,$backdro` = nU(lä $    }*
   $ Backdrop2 function((b·lljqCk) {0`  " $ var thad = thÈs
 "† $    ", a.Èmate!<(dhis$eleMGÓp.hasCLasq(%badeß9 ? fade' 9 '/

 `     "if ®4his.isSxown && thir/opuioÓs/back‰bop) {
") 0     ®var†doAnim`te 40$.rupport/draosityon(&& anamete

   !      tjis* Ba#kdRop = $('<dir #l!ss|"ioda|ΩbacÎdrnp 7 + anim`te + ß" />7)
¢ `      `  .appelfTo(documen$`odx)
B$`,    0  t`is>$beckfrm`.chick*
      (   † this.otthons‚dckdzop =5 &st¡tic' ?
   †$ $ ``  ` $.pRox{this.$element[0M.f-cUs,0thys.$uLe}eNt[0])*†          : $Æpvoxy(tËis.hide, t`is	
   !0   †0)
 `   †    iF",doAnilavg this.dbackdbop{0].odfsmt[itth$/ fOrcE sedlowK0         Uhis.§fcck$so/mddKhasÒ®'ÈN')       `0 if!(!cahlbi„k) return
( (""   " d/AnioapE ?
    † `    !ThiÛ/backdrokne®$.support&vzcNsition.eNd, fallbaCk) 2*     (  °   c`|L‚ack(©

`    0  }%glce ÈÊ†(!tËys,isShOwj &&"thks.$b`ckdrop- {
 @ ` p!  (phiw.$bacjdr/p,remveC|ep3(qn%)
     "   0$/Sup`oÚt>ÙransitÈ'n &&0thxs.$EleoeNt,h`sClaÛs('fada'â?"   !    0  djiSÆ$b`ckdrop.olu(.sıppor|.trqnÛiti..end, aall`Ack) :    ( 0! 0` s`lmb`cK()
    " ( }!Âls% if ®callback+!{
  0   †   kell"akk()   "  ( }J †    }
 †˝

 /* oODAL XLuGHN DeF	NI‘IKN
$ . =======-==5====})===== :/
( 6aV`|t 5 e.Ê.,modql
*  l.vo.modal = fuostiOn (ption){
  $ rg4urn tËiGæeash`func|kon ®)	z* !   $tar $uh)Û =0$(6Ëis)
  " ∞†` , eati$= $~His.det!∏'eodcn')0`      , opphons  $.eptunt8{˝, $.on*endal.dgfaults, $Thas.d!ta(), t}uaoF op}È|n$%= 'objEc|& && npv´on)*!"( Äif )!d!ta9 4this&date'medall (d·ti  NAw!Modadhthis. options))%
""†00 mf (typUnf mptIon 5= 'string') da4a[mptinn]()      else id$*optiÔns.sho) `ata.siow()
 0 `})
  y

  $ÆfN.modal.defiu|tsf=";
 (( ! `acÎdrkp: tp}e
`   $ keydoapd:!true
  ((,(Ûiow: true  }

 ($.fn*modal.CoÓstrctor Ω Odcl*Jö =*`MOL¡ NO CONVL…CU
  + ù====<=====?=9= */
(b4¶F..mnda,nno√Ôoflict45 dunct)on0() {™°   $.ff.modAl  old
  `"ruturn tlis
( }

 Ø. LOLCL DAVC-API
 0*0=u5===9=5=-=?}!*o
  (DocuMÂnt©.Ôn('clack.mod!l.Data#!xi%<†'[da|!)|ogule=mgdil¢]%l`fwnc$ion†(Ei {
 `((var this ="$(T is)ä     `$ hrev =($this.atur,'lrgB)     $, $tarÁut ="$(4dhis&attr(#tata-parget/) || (hrEf$&& href.replacE(/.*(Ω=g[Z\s]´$!o, 'ß))) /{Ù2it for he7  `   , optikn =!$¸%Úget.dadh(ßmoeal') ? Tog'le'":®$.eztend({ remote:a/#/.ıecv(hpuf) && hÚef }( $target*d!t·, %this.daua())

  ` e.prÂveotLefault()

     target
 † 2 !nmofalxOp4ion9ä 0" " .one('hideg, function0(! {
     $  %this.focus()
`     })
  ˝)

}8window.(Quer});
.* =-========<==9======-===?==?9==5====5===9===?====}=======Ω* * joot3traptoÔltip.Js÷2.3F2
&* lttx2?/twbs.giTxubbO}/bootstRa0/jaVascript.jtoltOoltaps
 ™ Inspired!by tle"nZIginal jQu%r}.tipCy By Kason Frame
0* ==?====Ω=========<===?====Ω=======≠=========<<=======/=J(* √op}{ighr 2051 Twiˆteq, Ilc.
†*
 * \iCensed under$rhe A!che!LiKefsm, VgRshon 2.∞ (the "\icensE"!;
!* you mau Óot"tÛe this fila excepÙ i.!comuliafca wIDh The Licenwe&
†* Xou ]ay obtaiÓ i #opy of0the Licensd‡qp *
 * (ttp://w7waPacÏg.grÁ/lic!nses/DICNSE6.0
 "
 " unlesÛ resuiÚuD0by atqlmCAbde liu or agreed uo in"writhn/, roftu`re
 * ‰is|ribuTud uÓeer thd License is$diwtz)bute$ /n an "AW†IS¢$@ASIS,
 *(_IT@KU WCRRANIES OZ GNODI\…ONS!œF aNY KŸLd,!eiÙxer ezPsess or implied*
 *†[ee thd License foÚ tie specifia lAngwase ggverning†pezmiswionk!and
Ç* limiTata/.q"ın`ds |(e LicEnse.
 *∞====5=-<=/<===========}=)====9==}}==9=======Ω====Ω==Ω===Ωhj/


0FunctikÓ (4) {
  "use RtrMc4"9 "/ Hshijt ;{9


0?* VOOLTIP PUBLIC CHaSS DUFI^IT[OF
  " =≠=}Ω========5===-========== (/

 †vap Tooltip 5 bunctkn (alemelp. opdmons) z    thiq.iNI¸*'‘oOltkq7, eÏemd.t,$optigns)
 `}J
 (tooytipNproto|yqm = k
0 $ consvructmr8 Tooltip
  , ifit: fujction ,Tqpe,0element¨ opTkons) k
  4(! var eve~tMn
  ( (   ,®eventO}tb 0(  " , trigggrs
(     ( , triggeb
        , i

   †  th)s.ı˘pe = type
 "  $ 4his.$e,amınt = $(e,≈mÌnt)
!" $  thic.opTions =(thiS.getŒ‡dio.s(optiofz)
 !0!Ä thÈs&enablel = trueJ
$ †  0tziwgers = thiw.optÈonr.tRigger.splkt(% &)

      f/r (i ?$driggers*LenwÙh;`i--;)0{
 0      tr`wgEb =0triggÁÚc[i]ö0 !    †ifH(trÈgger-= 'gmhkk')!{
    ‡     thisl$eleM%fv.on('slicK.'$* t`hr.type, thIs.mptions.selecTor,$'pbgxy(pjis.toggle,$th)s))     !  y$ulsl if (trifger !="'mpnıal') {
 `    $†  eventIn ? Ùrigger"== 'Hovev' ? 'mouqeantar& : 'vocus
  0       eventOuv = trieger 5= 'hkvEr' ? 'mo}sdlmavm' : 'blur'
   ∞  ` ` this>4elemen4.on(eventI~ + ',/ + uËas.t{pm,0thÈs.OPtioh3.selecpoˆ, $.proxy(t,is.Enter| this )
 ( "( 0` This~$dlement.on(evgntOut + gæ' ) this.t}pe,$Thms.options.selec|o2 *$.proxy(ti[s.leave, th)s))
       0}
     !]
   0  thIr.opÙins.ÛeÏE„toV =
      2†(thiÛn_options!= $.axtend({}Æ0txis.optaons< {0Triguez:$ØMAneah', selÂator:0g }))$8
   !   `Thys.fixDitle∏)
    mb
  ,(getGrtiÔ.s:"functIoo 8opti>~S) kZ (    mp|io~s <†$.extmnd™|, $.fn[dhis.type]defaults, tËis*$elemÌnt,eata(i,0optionq)
    0∞if2(optiNs.delay(&& typaof oqtiÊS.DelaY =? 'num‚er')p{
!!    ( ÔpviÔÓs.dÂmay? {
         dshow8 optimjs.dÂlay
 0  $ `< hide: optio.s.dela9
       $}
     }
J     zeturn op`imns
    ]
"(, entew:!.enctioÓ 	e) {
 $    var def·um|c = l.nn[vHIrt{RE].eEfaults
   $   !, muaonw Ω(s}ä(      #, semg
   `  tHisnoptÈons ¶& §.eacxjdhks._kAtigns(Function ,key, fal˝e) {ä !8 †   if (defawlts[cmy]!)= value( ort)ons[key] = veNuÂ
`    }l this)

 !    Ûelf =#$(e>cuprenvTaPgmt)[dhys.type](oxtaons).d·tA®t)iq.t˘pE)

!     in ()se~g.optioos.delay || #qelfÆoptikNsndeliq.sËÔw° reTurn self.s(kw()ä
    ( clearT`maoud(|his.uimeowti( $0¢ seib.kov%rStat• =$'i>'
  b ("this.dileout = sgtTimcout(Êunctkon))"{
 ∞ !    kf!(qelg/hoverSt`|e -? 'an') ceif¶rho7<)      }, ÛeofÆouÈons.Delqy.sho7!
    =

  ,"lEave: fujctinn†(e- {
   (  ~ar sMlf =`<(e.cqrrdltVarggt)[thkS.type](phi;._o`tinjw).data(tliÛ.type)
      yf (thÈr.ti|eOud)!cmgarTimeOut(this.timeout©
      i` (!rel&.optionr.delay"|| !sghd.oxtions.dElayÆ`iDe) zet]rnself.hidE*)

†  "  qelfÆhoverState = 'oUt'
! 2(0 this.V)eemuÙ = 3etDimeout*fuoÛÙioo¨© {
     !  iÊ$(sel&,hoverSt·uE == 'o}t')$se,f.jife )
      },`self.ptions.delaY,jidd)
   `˝
  , sho:†funcUion0() {*`   $ vqr %tmpäh! `   0, pos
    `  (, Actu`lWidthJ$   p  †, ActualIeÈÁht 0$     , hlacemeÓÙ*    (0$ - upJ     $  , e  .EvenÙ'sho7')

   "  Ëf (this,hcsCknteN4®) .&!dHis.enable‰) {
      ! thÈs.$element.trigger(e)
        if (e.isDefaultPrevented()) return
        $tip = this.tip()
        this.setContent()

        if (this.options.animation) {
          $tip.addClass('fade')
        }

        placement = typeof this.options.placement == 'function' ?
          this.options.placement.call(this, $tip[0], this.$element[0]) :
          this.options.placement

        $tip
          .detach()
          .css({ top: 0, left: 0, display: 'block' })

        this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element)

        pos = this.getPosition()

        actualWidth = $tip[0].offsetWidth
        actualHeight = $tip[0].offsetHeight

        switch (placement) {
          case 'bottom':
            tp = {top: pos.top + pos.height, left: pos.left + pos.width / 2 - actualWidth / 2}
            break
          case 'top':
            tp = {top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2}
            break
          case 'left':
            tp = {top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth}
            break
          case 'right':
            tp = {top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width}
            break
        }

        this.applyPlacement(tp, placement)
        this.$element.trigger('shown')
      }
    }

  , applyPlacement: function(offset, placement){
      var $tip = this.tip()
        , width = $tip[0].offsetWidth
        , height = $tip[0].offsetHeight
        , actualWidth
        , actualHeight
        , delta
        , replace

      $tip
        .offset(offset)
        .addClass(placement)
        .addClass('in')

      actualWidth = $tip[0].offsetWidth
      actualHeight = $tip[0].offsetHeight

      if (placement == 'top' && actualHeight != height) {
        offset.top = offset.top + height - actualHeight
        replace = true
      }

      if (placement == 'bottom' || placement == 'top') {
        delta = 0

        if (offset.left < 0){
          delta = offset.left * -2
          offset.left = 0
          $tip.offset(offset)
          actualWidth = $tip[0].offsetWidth
          actualHeight = $tip[0].offsetHeight
        }

        this.replaceArrow(delta - width + actualWidth, actualWidth, 'left')
      } else {
        this.replaceArrow(actualHeight - height, actualHeight, 'top')
      }

      if (replace) $tip.offset(offset)
    }

  , replaceArrow: function(delta, dimension, position){
      this
        .arrow()
        .css(position, delta ? (50 * (1 - delta / dimension) + "%") : '')
    }

  , setContent: function () {
      var $tip = this.tip()
        , title = this.getTitle()

      $tip.find('.tooltip-inner')[this.options.html ? 'html' : 'text'](title)
      $tip.removeClass('fade in top bottom left right')
    }

  , hide: function () {
      var that = this
        , $tip = this.tip()
        , e = $.Event('hide')

      this.$element.trigger(e)
      if (e.isDefaultPrevented()) return

      $tip.removeClass('in')

      function removeWithAnimation() {
        var timeout = setTimeout(function () {
          $tip.off($.support.transition.end).detach()
        }, 500)

        $tip.one($.support.transition.end, function () {
          clearTimeout(timeout)
          $tip.detach()
        })
      }

      $.support.transition && this.$tip.hasClass('fade') ?
        removeWithAnimation() :
        $tip.detach()

      this.$element.trigger('hidden')

      return this
    }

  , fixTitle: function () {
      var $e = this.$element
      if ($e.attr('title') || typeof($e.attr('data-original-title')) != 'string') {
        $e.attr('data-original-title', $e.attr('title') || '').attr('title', '')
      }
    }

  , hasContent: function () {
      return this.getTitle()
    }

  , getPosition: function () {
      var el = this.$element[0]
      return $.extend({}, (typeof el.getBoundingClientRect == 'function') ? el.getBoundingClientRect() : {
        width: el.offsetWidth
      , height: el.offsetHeight
      }, this.$element.offset())
    }

  , getTitle: function () {
      var title
        , $e = this.$element
        , o = this.options

      title = $e.attr('data-original-title')
        || (typeof o.title == 'function' ? o.title.call($e[0]) :  o.title)

      return title
    }

  , tip: function () {
      return this.$tip = this.$tip || $(this.options.template)
    }

  , arrow: function(){
      return this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow")
    }

  , validate: function () {
      if (!this.$element[0].parentNode) {
        this.hide()
        this.$element = null
        this.options = null
      }
    }

  , enable: function () {
      this.enabled = true
    }

  , disable: function () {
      this.enabled = false
    }

  , toggleEnabled: function () {
      this.enabled = !this.enabled
    }

  , toggle: function (e) {
      var self = e ? $(e.currentTarget)[this.type](this._options).data(this.type) : this
      self.tip().hasClass('in') ? self.hide() : self.show()
    }

  , destroy: function () {
      this.hide().$element.off('.' + this.type).removeData(this.type)
    }

  }


 /* TOOLTIP PLUGIN DEFINITION
  * ========================= */

  var old = $.fn.tooltip

  $.fn.tooltip = function ( option ) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('tooltip')
        , options = typeof option == 'object' && option
      if (!data) $this.data('tooltip', (data = new Tooltip(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.tooltip.Constructor = Tooltip

  $.fn.tooltip.defaults = {
    animation: true
  , placement: 'top'
  , selector: false
  , template: '<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>'
  , trigger: 'hover focus'
  , title: ''
  , delay: 0
  , html: false
  , container: false
  }


 /* TOOLTIP NO CONFLICT
  * =================== */

  $.fn.tooltip.noConflict = function () {
    $.fn.tooltip = old
    return this
  }

}(window.jQuery);
/* ===========================================================
 * bootstrap-popover.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#popovers
 * ===========================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * =========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


 /* POPOVER PUBLIC CLASS DEFINITION
  * =============================== */

  var Popover = function (element, options) {
    this.init('popover', element, options)
  }


  /* NOTE: POPOVER EXTENDS BOOTSTRAP-TOOLTIP.js
     ========================================== */

  Popover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype, {

    constructor: Popover

  , setContent: function () {
      var $tip = this.tip()
        , title = this.getTitle()
        , content = this.getContent()

      $tip.find('.popover-title')[this.options.html ? 'html' : 'text'](title)
      $tip.find('.popover-content')[this.options.html ? 'html' : 'text'](content)

      $tip.removeClass('fade top bottom left right in')
    }

  , hasContent: function () {
      return this.getTitle() || this.getContent()
    }

  , getContent: function () {
      var content
        , $e = this.$element
        , o = this.options

      content = (typeof o.content == 'function' ? o.content.call($e[0]) :  o.content)
        || $e.attr('data-content')

      return content
    }

  , tip: function () {
      if (!this.$tip) {
        this.$tip = $(this.options.template)
      }
      return this.$tip
    }

  , destroy: function () {
      this.hide().$element.off('.' + this.type).removeData(this.type)
    }

  })


 /* POPOVER PLUGIN DEFINITION
  * ======================= */

  var old = $.fn.popover

  $.fn.popover = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('popover')
        , options = typeof option == 'object' && option
      if (!data) $this.data('popover', (data = new Popover(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.popover.Constructor = Popover

  $.fn.popover.defaults = $.extend({} , $.fn.tooltip.defaults, {
    placement: 'right'
  , trigger: 'click'
  , content: ''
  , template: '<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
  })


 /* POPOVER NO CONFLICT
  * =================== */

  $.fn.popover.noConflict = function () {
    $.fn.popover = old
    return this
  }

}(window.jQuery);
/* =============================================================
 * bootstrap-scrollspy.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#scrollspy
 * =============================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================== */


!function ($) {

  "use strict"; // jshint ;_;


 /* SCROLLSPY CLASS DEFINITION
  * ========================== */

  function ScrollSpy(element, options) {
    var process = $.proxy(this.process, this)
      , $element = $(element).is('body') ? $(window) : $(element)
      , href
    this.options = $.extend({}, $.fn.scrollspy.defaults, options)
    this.$scrollElement = $element.on('scroll.scroll-spy.data-api', process)
    this.selector = (this.options.target
      || ((href = $(element).attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) //strip for ie7
      || '') + ' .nav li > a'
    this.$body = $('body')
    this.refresh()
    this.process()
  }

  ScrollSpy.prototype = {

      constructor: ScrollSpy

    , refresh: function () {
        var self = this
          , $targets

        this.offsets = $([])
        this.targets = $([])

        $targets = this.$body
          .find(this.selector)
          .map(function () {
            var $el = $(this)
              , href = $el.data('target') || $el.attr('href')
              , $href = /^#\w/.test(href) && $(href)
            return ( $href
              && $href.length
              && [[ $href.position().top + (!$.isWindow(self.$scrollElement.get(0)) && self.$scrollElement.scrollTop()), href ]] ) || null
          })
          .sort(function (a, b) { return a[0] - b[0] })
          .each(function () {
            self.offsets.push(this[0])
            self.targets.push(this[1])
          })
      }

    , process: function () {
        var scrollTop = this.$scrollElement.scrollTop() + this.options.offset
          , scrollHeight = this.$scrollElement[0].scrollHeight || this.$body[0].scrollHeight
          , maxScroll = scrollHeight - this.$scrollElement.height()
          , offsets = this.offsets
          , targets = this.targets
          , activeTarget = this.activeTarget
          , i

        if (scrollTop >= maxScroll) {
          return activeTarget != (i = targets.last()[0])
            && this.activate ( i )
        }

        for (i = offsets.length; i--;) {
          activeTarget != targets[i]
            && scrollTop >= offsets[i]
            && (!offsets[i + 1] || scrollTop <= offsets[i + 1])
            && this.activate( targets[i] )
        }
      }

    , activate: function (target) {
        var active
          , selector

        this.activeTarget = target

        $(this.selector)
          .parent('.active')
          .removeClass('active')

        selector = this.selector
          + '[data-target="' + target + '"],'
          + this.selector + '[href="' + target + '"]'

        active = $(selector)
          .parent('li')
          .addClass('active')

        if (active.parent('.dropdown-menu').length)  {
          active = active.closest('li.dropdown').addClass('active')
        }

        active.trigger('activate')
      }

  }


 /* SCROLLSPY PLUGIN DEFINITION
  * =========================== */

  var old = $.fn.scrollspy

  $.fn.scrollspy = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('scrollspy')
        , options = typeof option == 'object' && option
      if (!data) $this.data('scrollspy', (data = new ScrollSpy(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.scrollspy.Constructor = ScrollSpy

  $.fn.scrollspy.defaults = {
    offset: 10
  }


 /* SCROLLSPY NO CONFLICT
  * ===================== */

  $.fn.scrollspy.noConflict = function () {
    $.fn.scrollspy = old
    return this
  }


 /* SCROLLSPY DATA-API
  * ================== */

  $(window).on('load', function () {
    $('[data-spy="scroll"]').each(function () {
      var $spy = $(this)
      $spy.scrollspy($spy.data())
    })
  })

}(window.jQuery);/* ========================================================
 * bootstrap-tab.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#tabs
 * ========================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ======================================================== */


!function ($) {

  "use strict"; // jshint ;_;


 /* TAB CLASS DEFINITION
  * ==================== */

  var Tab = function (element) {
    this.element = $(element)
  }

  Tab.prototype = {

    constructor: Tab

  , show: function () {
      var $this = this.element
        , $ul = $this.closest('ul:not(.dropdown-menu)')
        , selector = $this.attr('data-target')
        , previous
        , $target
        , e

      if (!selector) {
        selector = $this.attr('href')
        selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') //strip for ie7
      }

      if ( $this.parent('li').hasClass('active') ) return

      previous = $ul.find('.active:last a')[0]

      e = $.Event('show', {
        relatedTarget: previous
      })

      $this.trigger(e)

      if (e.isDefaultPrevented()) return

      $target = $(selector)

      this.activate($this.parent('li'), $ul)
      this.activate($target, $target.parent(), function () {
        $this.trigger({
          type: 'shown'
        , relatedTarget: previous
        })
      })
    }

  , activate: function ( element, container, callback) {
      var $active = container.find('> .active')
        , transition = callback
            && $.support.transition
            && $active.hasClass('fade')

      function next() {
        $active
          .removeClass('active')
          .find('> .dropdown-menu > .active')
          .removeClass('active')

        element.addClass('active')

        if (transition) {
          element[0].offsetWidth // reflow for transition
          element.addClass('in')
        } else {
          element.removeClass('fade')
        }

        if ( element.parent('.dropdown-menu') ) {
          element.closest('li.dropdown').addClass('active')
        }

        callback && callback()
      }

      transition ?
        $active.one($.support.transition.end, next) :
        next()

      $active.removeClass('in')
    }
  }


 /* TAB PLUGIN DEFINITION
  * ===================== */

  var old = $.fn.tab

  $.fn.tab = function ( option ) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('tab')
      if (!data) $this.data('tab', (data = new Tab(this)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.tab.Constructor = Tab


 /* TAB NO CONFLICT
  * =============== */

  $.fn.tab.noConflict = function () {
    $.fn.tab = old
    return this
  }


 /* TAB DATA-API
  * ============ */

  $(document).on('click.tab.data-api', '[data-toggle="tab"], [data-toggle="pill"]', function (e) {
    e.preventDefault()
    $(this).tab('show')
  })

}(window.jQuery);/* =============================================================
 * bootstrap-typeahead.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#typeahead
 * =============================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */


!function($){

  "use strict"; // jshint ;_;


 /* TYPEAHEAD PUBLIC CLASS DEFINITION
  * ================================= */

  var Typeahead = function (element, options) {
    this.$element = $(element)
    this.options = $.extend({}, $.fn.typeahead.defaults, options)
    this.matcher = this.options.matcher || this.matcher
    this.sorter = this.options.sorter || this.sorter
    this.highlighter = this.options.highlighter || this.highlighter
    this.updater = this.options.updater || this.updater
    this.source = this.options.source
    this.$menu = $(this.options.menu)
    this.shown = false
    this.listen()
  }

  Typeahead.prototype = {

    constructor: Typeahead

  , select: function () {
      var val = this.$menu.find('.active').attr('data-value')
      this.$element
        .val(this.updater(val))
        .change()
      return this.hide()
    }

  , updater: function (item) {
      return item
    }

  , show: function () {
      var pos = $.extend({}, this.$element.position(), {
        height: this.$element[0].offsetHeight
      })

      this.$menu
        .insertAfter(this.$element)
        .css({
          top: pos.top + pos.height
        , left: pos.left
        })
        .show()

      this.shown = true
      return this
    }

  , hide: function () {
      this.$menu.hide()
      this.shown = false
      return this
    }

  , lookup: function (event) {
      var items

      this.query = this.$element.val()

      if (!this.query || this.query.length < this.options.minLength) {
        return this.shown ? this.hide() : this
      }

      items = $.isFunction(this.source) ? this.source(this.query, $.proxy(this.process, this)) : this.source

      return items ? this.process(items) : this
    }

  , process: function (items) {
      var that = this

      items = $.grep(items, function (item) {
        return that.matcher(item)
      })

      items = this.sorter(items)

      if (!items.length) {
        return this.shown ? this.hide() : this
      }

      return this.render(items.slice(0, this.options.items)).show()
    }

  , matcher: function (item) {
      return ~item.toLowerCase().indexOf(this.query.toLowerCase())
    }

  , sorter: function (items) {
      var beginswith = []
        , caseSensitive = []
        , caseInsensitive = []
        , item

      while (item = items.shift()) {
        if (!item.toLowerCase().indexOf(this.query.toLowerCase())) beginswith.push(item)
        else if (~item.indexOf(this.query)) caseSensitive.push(item)
        else caseInsensitive.push(item)
      }

      return beginswith.concat(caseSensitive, caseInsensitive)
    }

  , highlighter: function (item) {
      var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&')
      return item.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
        return '<strong>' + match + '</strong>'
      })
    }

  , render: function (items) {
      var that = this

      items = $(items).map(function (i, item) {
        i = $(that.options.item).attr('data-value', item)
        i.find('a').html(that.highlighter(item))
        return i[0]
      })

      items.first().addClass('active')
      this.$menu.html(items)
      return this
    }

  , next: function (event) {
      var active = this.$menu.find('.active').removeClass('active')
        , next = active.next()

      if (!next.length) {
        next = $(this.$menu.find('li')[0])
      }

      next.addClass('active')
    }

  , prev: function (event) {
      var active = this.$menu.find('.active').removeClass('active')
        , prev = active.prev()

      if (!prev.length) {
        prev = this.$menu.find('li').last()
      }

      prev.addClass('active')
    }

  , listen: function () {
      this.$element
        .on('focus',    $.proxy(this.focus, this))
        .on('blur',     $.proxy(this.blur, this))
        .on('keypress', $.proxy(this.keypress, this))
        .on('keyup',    $.proxy(this.keyup, this))

      if (this.eventSupported('keydown')) {
        this.$element.on('keydown', $.proxy(this.keydown, this))
      }

      this.$menu
        .on('click', $.proxy(this.click, this))
        .on('mouseenter', 'li', $.proxy(this.mouseenter, this))
        .on('mouseleave', 'li', $.proxy(this.mouseleave, this))
    }

  , eventSupported: function(eventName) {
      var isSupported = eventName in this.$element
      if (!isSupported) {
        this.$element.setAttribute(eventName, 'return;')
        isSupported = typeof this.$element[eventName] === 'function'
      }
      return isSupported
    }

  , move: function (e) {
      if (!this.shown) return

      switch(e.keyCode) {
        case 9: // tab
        case 13: // enter
        case 27: // escape
          e.preventDefault()
          break

        case 38: // up arrow
          e.preventDefault()
          this.prev()
          break

        case 40: // down arrow
          e.preventDefault()
          this.next()
          break
      }

      e.stopPropagation()
    }

  , keydown: function (e) {
      this.suppressKeyPressRepeat = ~$.inArray(e.keyCode, [40,38,9,13,27])
      this.move(e)
    }

  , keypress: function (e) {
      if (this.suppressKeyPressRepeat) return
      this.move(e)
    }

  , keyup: function (e) {
      switch(e.keyCode) {
        case 40: // down arrow
        case 38: // up arrow
        case 16: // shift
        case 17: // ctrl
        case 18: // alt
          break

        case 9: // tab
        case 13: // enter
          if (!this.shown) return
          this.select()
          break

        case 27: // escape
          if (!this.shown) return
          this.hide()
          break

        default:
          this.lookup()
      }

      e.stopPropagation()
      e.preventDefault()
  }

  , focus: function (e) {
      this.focused = true
    }

  , blur: function (e) {
      this.focused = false
      if (!this.mousedover && this.shown) this.hide()
    }

  , click: function (e) {
      e.stopPropagation()
      e.preventDefault()
      this.select()
      this.$element.focus()
    }

  , mouseenter: function (e) {
      this.mousedover = true
      this.$menu.find('.active').removeClass('active')
      $(e.currentTarget).addClass('active')
    }

  , mouseleave: function (e) {
      this.mousedover = false
      if (!this.focused && this.shown) this.hide()
    }

  }


  /* TYPEAHEAD PLUGIN DEFINITION
   * =========================== */

  var old = $.fn.typeahead

  $.fn.typeahead = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('typeahead')
        , options = typeof option == 'object' && option
      if (!data) $this.data('typeahead', (data = new Typeahead(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.typeahead.defaults = {
    source: []
  , items: 8
  , menu: '<ul class="typeahead dropdown-menu"></ul>'
  , item: '<li><a href="#"></a></li>'
  , minLength: 1
  }

  $.fn.typeahead.Constructor = Typeahead


 /* TYPEAHEAD NO CONFLICT
  * =================== */

  $.fn.typeahead.noConflict = function () {
    $.fn.typeahead = old
    return this
  }


 /* TYPEAHEAD DATA-API
  * ================== */

  $(document).on('focus.typeahead.data-api', '[data-provide="typeahead"]', function (e) {
    var $this = $(this)
    if ($this.data('typeahead')) return
    $this.typeahead($this.data())
  })

}(window.jQuery);
/* ==========================================================
 * bootstrap-affix.js v2.3.2
 * http://twbs.github.com/bootstrap/javascript.html#affix
 * ==========================================================
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


 /* AFFIX CLASS DEFINITION
  * ====================== */

  var Affix = function (element, options) {
    this.options = $.extend({}, $.fn.affix.defaults, options)
    this.$window = $(window)
      .on('scroll.affix.data-api', $.proxy(this.checkPosition, this))
      .on('click.affix.data-api',  $.proxy(function () { setTimeout($.proxy(this.checkPosition, this), 1) }, this))
    this.$element = $(element)
    this.checkPosition()
  }

  Affix.prototype.checkPosition = function () {
    if (!this.$element.is(':visible')) return

    var scrollHeight = $(document).height()
      , scrollTop = this.$window.scrollTop()
      , position = this.$element.offset()
      , offset = this.options.offset
      , offsetBottom = offset.bottom
      , offsetTop = offset.top
      , reset = 'affix affix-top affix-bottom'
      , affix

    if (typeof offset != 'object') offsetBottom = offsetTop = offset
    if (typeof offsetTop == 'function') offsetTop = offset.top()
    if (typeof offsetBottom == 'function') offsetBottom = offset.bottom()

    affix = this.unpin != null && (scrollTop + this.unpin <= position.top) ?
      false    : offsetBottom != null && (position.top + this.$element.height() >= scrollHeight - offsetBottom) ?
      'bottom' : offsetTop != null && scrollTop <= offsetTop ?
      'top'    : false

    if (this.affixed === affix) return

    this.affixed = affix
    this.unpin = affix == 'bottom' ? position.top - scrollTop : null

    this.$element.removeClass(reset).addClass('affix' + (affix ? '-' + affix : ''))
  }


 /* AFFIX PLUGIN DEFINITION
  * ======================= */

  var old = $.fn.affix

  $.fn.affix = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('affix')
        , options = typeof option == 'object' && option
      if (!data) $this.data('affix', (data = new Affix(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.affix.Constructor = Affix

  $.fn.affix.defaults = {
    offset: 0
  }


 /* AFFIX NO CONFLICT
  * ================= */

  $.fn.affix.noConflict = function () {
    $.fn.affix = old
    return this
  }


 /* AFFIX DATA-API
  * ============== */

  $(window).on('load', function () {
    $('[data-spy="affix"]').each(function () {
      var $spy = $(this)
        , data = $spy.data()

      data.offset = data.offset || {}

      data.offsetBottom && (data.offset.bottom = data.offsetBottom)
      data.offsetTop && (data.offset.top = data.offsetTop)

      $spy.affix(data)
    })
  })


}(window.jQuery);