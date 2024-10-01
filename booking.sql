CREATE TABLE public.booking (
  id integer,
  vehicle_id integer,
  customer_id integer ,
  driver_id integer ,
  start_date date ,
  end_date date(11) ,
  deleted character varying(45) DEFAULT false,
  account_id integer ,
  created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (id));
