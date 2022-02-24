import $ from 'jquery'
class GridPostsSelector extends window.HTMLElement {
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
  }

  resolveElements () {
    this.$video = $('video', this)
    this.$itemVideo = $('.content-link--Video', this)
  }

  bindFunctions () {
    this.playVideo = this.playVideo.bind(this)
    this.pauseVideo = this.pauseVideo.bind(this)
  }

  bindEvents () {
    this.$itemVideo.on('mouseenter', this.playVideo)
    this.$itemVideo.on('mouseleave', this.pauseVideo)
  }

  playVideo (e) {
    this.$video.removeClass('video-dark')
  }

  pauseVideo (e) {
    this.$video.addClass('video-dark')
  }
}

window.customElements.define('flynt-grid-posts-selector', GridPostsSelector, { extends: 'div' })
