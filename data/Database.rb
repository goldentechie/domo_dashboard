Database

TeamUsers
  id
  teamid
  name
  deleted
  color
  real_name
  img_url

Events
  id(time_stamp) string
  type: default "message"
  subtype: default "none"
  client_msg_id : default "none"
  user_id: default "none"
  bot_id: default null
  time_stamp
  text
  
Channels
  id
  name
  created
  num_members: default 0

LastScan
  id
  term
  lastscanned
