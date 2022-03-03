import $ from 'jquery'

class NavigationMain extends window.HTMLElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$ = $(this)
    this.resolveElements()
    this.bindFunctions()
    this.bindEvents()
    if (this.$banner) {
      this.onScroll()
    } else {
      this.$headerWrapper.addClass('wrapper--visible')
    }
  }

  resolveElements () {
    this.$window = $(window)
    this.$document = $(document)
    this.$banner = $('.js-hero-banner', this.$document)
    this.$headerWrapper = $('.wrapper', this)
  }

  bindFunctions () {
    this.onScroll = this.onScroll.bind(this)
    this.showHeader = this.showHeader.bind(this)
    this.colorLogo = this.colorLogo.bind(this)
  }

  bindEvents () {
    this.$window.on('scroll', this.onScroll)
  }

  onScroll(e) {
    this.colorLogo(e)
    this.showHeader(e)
  }

  showHeader (e) {
    const scroll = this.$window.scrollTop()
    if (scroll > 0) {
      this.$headerWrapper.addClass('wrapper--visible')
    } else {
      this.$headerWrapper.removeClass('wrapper--visible')
    }
  }

  colorLogo (e) {
    const scroll = this.$window.scrollTop()
    const $headerHeight = this.$headerWrapper.innerHeight();
    const $bannerHeight = this.$banner.innerHeight()

    if (scroll >= ($bannerHeight - $headerHeight)) {
      this.$headerWrapper.removeClass('wrapper--transparent')
    } else {
      this.$headerWrapper.addClass('wrapper--transparent')
    }
  }
}

window.customElements.define('flynt-navigation-main', NavigationMain, { extends: 'nav' })
