import React, { Component } from "react";
import { connect } from "react-redux";
import { Link, Redirect } from "react-router-dom";
import PropTypes from "prop-types";
import { retrieve, reset } from "../../actions/commerce/show";
import { del } from "../../actions/commerce/delete";

class Show extends Component {
  static propTypes = {
    retrieved: PropTypes.object,
    loading: PropTypes.bool.isRequired,
    error: PropTypes.string,
    eventSource: PropTypes.instanceOf(EventSource),
    retrieve: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
    deleteError: PropTypes.string,
    deleteLoading: PropTypes.bool.isRequired,
    deleted: PropTypes.object,
    del: PropTypes.func.isRequired,
  };

  componentDidMount() {
    this.props.retrieve(decodeURIComponent(this.props.match.params.id));
  }

  componentWillUnmount() {
    this.props.reset(this.props.eventSource);
  }

  del = () => {
    if (window.confirm("Are you sure you want to delete this item?"))
      this.props.del(this.props.retrieved);
  };

  render() {
    if (this.props.deleted) return <Redirect to=".." />;

    const item = this.props.retrieved;

    return (
      <div>
        <h1>Show {item && item["@id"]}</h1>

        {this.props.loading && (
          <div className="alert alert-info" role="status">
            Loading...
          </div>
        )}
        {this.props.error && (
          <div className="alert alert-danger" role="alert">
            <span className="fa fa-exclamation-triangle" aria-hidden="true" />{" "}
            {this.props.error}
          </div>
        )}
        {this.props.deleteError && (
          <div className="alert alert-danger" role="alert">
            <span className="fa fa-exclamation-triangle" aria-hidden="true" />{" "}
            {this.props.deleteError}
          </div>
        )}

        {item && (
          <table className="table table-responsive table-striped table-hover">
            <thead>
              <tr>
                <th>Field</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">nom</th>
                <td>{item["nom"]}</td>
              </tr>
              <tr>
                <th scope="row">numero</th>
                <td>{item["numero"]}</td>
              </tr>
              <tr>
                <th scope="row">bis</th>
                <td>{item["bis"]}</td>
              </tr>
              <tr>
                <th scope="row">voie</th>
                <td>{item["voie"]}</td>
              </tr>
              <tr>
                <th scope="row">rue</th>
                <td>{item["rue"]}</td>
              </tr>
              <tr>
                <th scope="row">complement</th>
                <td>{item["complement"]}</td>
              </tr>
              <tr>
                <th scope="row">postale</th>
                <td>{item["postale"]}</td>
              </tr>
              <tr>
                <th scope="row">ville</th>
                <td>{item["ville"]}</td>
              </tr>
              <tr>
                <th scope="row">latitude</th>
                <td>{item["latitude"]}</td>
              </tr>
              <tr>
                <th scope="row">longitude</th>
                <td>{item["longitude"]}</td>
              </tr>
              <tr>
                <th scope="row">email</th>
                <td>{item["email"]}</td>
              </tr>
              <tr>
                <th scope="row">telephone</th>
                <td>{item["telephone"]}</td>
              </tr>
              <tr>
                <th scope="row">fax</th>
                <td>{item["fax"]}</td>
              </tr>
              <tr>
                <th scope="row">typologie</th>
                <td>{item["typologie"]}</td>
              </tr>
              <tr>
                <th scope="row">pmr</th>
                <td>{item["pmr"]}</td>
              </tr>
              <tr>
                <th scope="row">lundi</th>
                <td>{this.renderLinks("lundis", item["lundi"])}</td>
              </tr>
              <tr>
                <th scope="row">mardi</th>
                <td>{this.renderLinks("mardis", item["mardi"])}</td>
              </tr>
              <tr>
                <th scope="row">mercredi</th>
                <td>{this.renderLinks("mercredis", item["mercredi"])}</td>
              </tr>
              <tr>
                <th scope="row">jeudi</th>
                <td>{this.renderLinks("jeudis", item["jeudi"])}</td>
              </tr>
              <tr>
                <th scope="row">vendredi</th>
                <td>{this.renderLinks("vendredis", item["vendredi"])}</td>
              </tr>
              <tr>
                <th scope="row">samedi</th>
                <td>{this.renderLinks("samedis", item["samedi"])}</td>
              </tr>
              <tr>
                <th scope="row">dimanche</th>
                <td>{this.renderLinks("dimanches", item["dimanche"])}</td>
              </tr>
              <tr>
                <th scope="row">information</th>
                <td>{this.renderLinks("information", item["information"])}</td>
              </tr>
              <tr>
                <th scope="row">comptabilite</th>
                <td>
                  {this.renderLinks("comptabilites", item["comptabilite"])}
                </td>
              </tr>
              <tr>
                <th scope="row">gerant</th>
                <td>{this.renderLinks("gerants", item["gerant"])}</td>
              </tr>
              <tr>
                <th scope="row">proprietaire</th>
                <td>
                  {this.renderLinks("proprietaires", item["proprietaire"])}
                </td>
              </tr>
            </tbody>
          </table>
        )}
        <Link to=".." className="btn btn-primary">
          Back to list
        </Link>
        {item && (
          <Link to={`/commerces/edit/${encodeURIComponent(item["@id"])}`}>
            <button className="btn btn-warning">Edit</button>
          </Link>
        )}
        <button onClick={this.del} className="btn btn-danger">
          Delete
        </button>
      </div>
    );
  }

  renderLinks = (type, items) => {
    if (Array.isArray(items)) {
      return items.map((item, i) => (
        <div key={i}>{this.renderLinks(type, item)}</div>
      ));
    }

    return (
      <Link to={`../../${type}/show/${encodeURIComponent(items)}`}>
        {items}
      </Link>
    );
  };
}

const mapStateToProps = (state) => ({
  retrieved: state.commerce.show.retrieved,
  error: state.commerce.show.error,
  loading: state.commerce.show.loading,
  eventSource: state.commerce.show.eventSource,
  deleteError: state.commerce.del.error,
  deleteLoading: state.commerce.del.loading,
  deleted: state.commerce.del.deleted,
});

const mapDispatchToProps = (dispatch) => ({
  retrieve: (id) => dispatch(retrieve(id)),
  del: (item) => dispatch(del(item)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(Show);
