class CreateSubscribes < ActiveRecord::Migration
  def change
    create_table :subscribes do |t|

      t.string  :address
      t.timestamps
    end
  end
end
