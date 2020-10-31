const ChatPlugin = {
  element: "",
  questions: {},
  question: "",
  options: [],
  result: [],
  temp: {},
  init(element, data) {
    element.empty()
    $(".chat_replay").empty()
    this.element = element
    this.questions = data.questions
    var question_id = 1
    if(data.initialQuestion) { question_id = data.initialQuestion }
    this.setQuestion(question_id)
  },
  setQuestion(question_id) {
    console.log(question_id)
    if(question_id && this.questions[question_id]) {
      var data = this.questions[question_id]
      console.log(data)
      this.temp.question = this.question = data.question
      this.options = data.options
      this.addQuestion()
    }else{
      console.log("No More Questions!")
    }
  },
  addQuestion() {
    setTimeout(function(){
      $(".msg_received.typing").remove()
      if(this.question) {
        var html = `<div class="msg_received">${this.question}</div>`
        this.element.append(html)
        this.addOptions()
      }
    }.bind(this), 1000)
  },
  addOptions() {
    if(this.options && this.options.length > 0){
      this.options.forEach(function(item, index){
        var next = ""
        if(item.next) {
          next = `data-question="${item.next}"`
        }
        var html = `<div ${next} class="chat_option">${item.answer}</div>`
        $(".chat_replay").append(html)
      }.bind(this))
      var _this = this
      $(".chat_option").click(function() {
        $(".chat_replay").empty()
        _this.temp.answer = $(this).text()
        _this.result.push(_this.temp)
        _this.temp= {}
        _this.addReplay($(this).text())
        setTimeout(function(){
          if($(this).data('question')) {
            _this.element.append(`<div class="msg_received typing">typing...</div>`)
            _this.setQuestion($(this).data('question'))
          }else{
            _this.setFinish()
          }
        }.bind(this), 1000)
        
      })
    }
  },
  addReplay(answer) {
    var html = `<div class="msg_sent">${answer}</div>`
    this.element.append(html)
  },
  setFinish() {
    console.log(this.result)
    $(".chat_replay").html(`
      <div class="text-center"><button class="btn btn-primary mt-4">Submit</button></div>
    `)
  }

}