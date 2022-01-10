import React from "react";
import { Route } from "react-router-dom";
import { List, Create, Update, Show } from "../components/commerce/";

export default [
  <Route path="/commerces/create" component={Create} exact key="create" />,
  <Route path="/commerces/edit/:id" component={Update} exact key="update" />,
  <Route path="/commerces/show/:id" component={Show} exact key="show" />,
  <Route path="/commerces/" component={List} exact strict key="list" />,
  <Route path="/commerces/:page" component={List} exact strict key="page" />,
];
