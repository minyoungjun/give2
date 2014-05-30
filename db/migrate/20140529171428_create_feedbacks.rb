class CreateFeedbacks < ActiveRecord::Migration
  def change
    create_table :feedbacks do |t|

      t.string  :realname
      t.string  :address
      t.text :content
      t.timestamps
    end
  end
end
