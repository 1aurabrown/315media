import $ from 'jquery'

class HeroVideoHome extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args)
    self.init()
    return self
  }

  init () {
    this.$el = $(this)
    this.resolveElements()
    this.bindFunctions()
    this.bindEvents()
    this.videoSize()
  }

  videoSize () {
    var windowHeight = $(window).height()
    var windowWidth = $(window).width()
    var videoHeight = this.$iframe.outerHeight()
    var videoWidth = this.$iframe.outerWidth()

    var aspectRatio = 100 * videoHeight / videoWidth
    this.$iframe.css({ top: 0, left: 0, position: 'absolute', width: '100%', height: '100%' })
    this.$videoPlayer.css({ 'padding-bottom': aspectRatio + '%' })

    if (windowHeight < windowWidth) {
      this.$videoWrapper.css({
        width: `calc(100vh * ${videoWidth / videoHeight})`
      })
    } else {
      this.$videoWrapper.removeAttr('style')
    }
  }

  resolveElements () {
    this.$posterImage = $('.figure-image', this)
    this.$videoPlayer = $('.video-player', this)
    this.$iframe = $('iframe', this)
    this.$videoWrapper = $('.video', this)
    this.$window = $(window)
  }

  bindFunctions () {
    this.loadVideo = this.loadVideo.bind(this)
    this.videoIsLoaded = this.videoIsLoaded.bind(this)
    this.videoSize = this.videoSize.bind(this)
  }

  bindEvents () {
    this.$window.on('load', this.loadVideo)
    this.$window.on('resize', this.videoSize)
  }

  loadVideo () {
    if (!this.$iframe) return
    this.$iframe.on('load', this.videoIsLoaded.bind(this))
    this.$iframe.attr('src', this.$iframe.data('src'))
    // this.$videoPlayer.addClass('video-player--isLoading')
  }

  videoIsLoaded () {
    if (!this.$videoPlayer) return
    this.$el.removeClass('isLoading')
    this.$el.addClass('isLoaded')
    if (!this.$posterImage) return
    this.$posterImage.addClass('figure-image--isHidden')
  }
}

window.customElements.define('flynt-hero-video-home', HeroVideoHome, { extends: 'div' })
