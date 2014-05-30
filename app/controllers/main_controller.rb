class MainController < ApplicationController
  def mail
    @sub = Subscribe.all
  end
  def add_subscribe
    if Subscribe.where(:address => params[:address]).count < 1
      subscribe = Subscribe.new
      subscribe.address = params[:address]
      if subscribe.valid?
        subscribe.save
        render json: ["#{subscribe.address}"]
      else
        render json: ["wrong"]
      end
    else
      render json: ["fail"]
    end
  end
  def add_feedback
    feedback = Feedback.new
    feedback.realname = params[:realname]
    feedback.address = params[:address]
    feedback.content = params[:content]
    feedback.save
  end
end
