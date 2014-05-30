require 'valid_email'
class Subscribe < ActiveRecord::Base
  validates :address, :presence => true, :email => true
end
