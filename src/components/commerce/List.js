import React, { Component } from "react";
import { connect } from "react-redux";
import { Link } from "react-router-dom";
import PropTypes from "prop-types";
import { list, reset } from "../../actions/commerce/list";

class List extends Component {
  static propTypes = {
    retrieved: PropTypes.object,
    loading: PropTypes.bool.isRequired,
    error: PropTypes.string,
    eventSource: PropTypes.instanceOf(EventSource),
    deletedItem: PropTypes.object,
    list: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
  };

  componentDidMount() {
    this.props.list(
      this.props.match.params.page &&
        decodeURIComponent(this.props.match.params.page)
    );
  }

  componentDidUpdate(prevProps) {
    if (this.props.match.params.page !== prevProps.match.params.page)
      this.props.list(
        this.props.match.params.page &&
          decodeURIComponent(this.props.match.params.page)
      );
  }

  componentWillUnmount() {
    this.props.reset(this.props.eventSource);
  }

  render() {
    return (
      <div>
        <h1>Commerce List</h1>

        {this.props.loading && (
          <div className="alert alert-info">Loading...</div>
        )}
        {this.props.deletedItem && (
          <div className="alert alert-success">
            {this.props.deletedItem["@id"]} deleted.
          </div>
        )}
        {this.props.error && (
          <div className="alert alert-danger">{this.props.error}</div>
        )}

        <p>
          <Link to="create" className="btn btn-primary">
            Create
          </Link>
        </p>

        <table className="table table-responsive table-striped table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>nom</th>
              <th>numero</th>
              <th>bis</th>
              <th>voie</th>
              <th>rue</th>
              <th>complement</th>
              <th>postale</th>
              <th>ville</th>
              <th>latitude</th>
              <th>longitude</th>
              <th>email</th>
              <th>telephone</th>
              <th>fax</th>
              <th>typologie</th>
              <th>pmr</th>
              <th>lundi</th>
              <th>mardi</th>
              <th>mercredi</th>
              <th>jeudi</th>
              <th>vendredi</th>
              <th>samedi</th>
              <th>dimanche</th>
              <th>information</th>
              <th>comptabilite</th>
              <th>gerant</th>
              <th>proprietaire</th>
              <th colSpan={2} />
            </tr>
          </thead>
          <tbody>
            {this.props.retrieved &&
              this.props.retrieved["hydra:member"].map((item) => (
                <tr key={item["@id"]}>
                  <th scope="row">
                    <Link to={`show/${encodeURIComponent(item["@id"])}`}>
                      {item["@id"]}
                    </Link>
                  </th>
                  <td>{item["nom"]}</td>
                  <td>{item["numero"]}</td>
                  <td>{item["bis"]}</td>
                  <td>{item["voie"]}</td>
                  <td>{item["rue"]}</td>
                  <td>{item["complement"]}</td>
                  <td>{item["postale"]}</td>
                  <td>{item["ville"]}</td>
                  <td>{item["latitude"]}</td>
                  <td>{item["longitude"]}</td>
                  <td>{item["email"]}</td>
                  <td>{item["telephone"]}</td>
                  <td>{item["fax"]}</td>
                  <td>{item["typologie"]}</td>
                  <td>{item["pmr"]}</td>
                  <td>{this.renderLinks("lundis", item["lundi"])}</td>
                  <td>{this.renderLinks("mardis", item["mardi"])}</td>
                  <td>{this.renderLinks("mercredis", item["mercredi"])}</td>
                  <td>{this.renderLinks("jeudis", item["jeudi"])}</td>
                  <td>{this.renderLinks("vendredis", item["vendredi"])}</td>
                  <td>{this.renderLinks("samedis", item["samedi"])}</td>
                  <td>{this.renderLinks("dimanches", item["dimanche"])}</td>
                  <td>
                    {this.renderLinks("information", item["information"])}
                  </td>
                  <td>
                    {this.renderLinks("comptabilites", item["comptabilite"])}
                  </td>
                  <td>{this.renderLinks("gerants", item["gerant"])}</td>
                  <td>
                    {this.renderLinks("proprietaires", item["proprietaire"])}
                  </td>
                  <td>
                    <Link to={`show/${encodeURIComponent(item["@id"])}`}>
                      <span className="fa fa-search" aria-hidden="true" />
                      <span className="sr-only">Show</span>
                    </Link>
                  </td>
                  <td>
                    <Link to={`edit/${encodeURIComponent(item["@id"])}`}>
                      <span className="fa fa-pencil" aria-hidden="true" />
                      <span className="sr-only">Edit</span>
                    </Link>
                  </td>
                </tr>
              ))}
          </tbody>
        </table>

        {this.pagination()}
      </div>
    );
  }

  pagination() {
    const view = this.props.retrieved && this.props.retrieved["hydra:view"];
    if (!view || !view["hydra:first"]) return;

    const {
      "hydra:first": first,
      "hydra:previous": previous,
      "hydra:next": next,
      "hydra:last": last,
    } = view;

    return (
      <nav aria-label="Page navigation">
        <Link
          to="."
          className={`btn btn-primary${previous ? "" : " disabled"}`}
        >
          <span aria-hidden="true">&lArr;</span> First
        </Link>
        <Link
          to={
            !previous || previous === first ? "." : encodeURIComponent(previous)
          }
          className={`btn btn-primary${previous ? "" : " disabled"}`}
        >
          <span aria-hidden="true">&larr;</span> Previous
        </Link>
        <Link
          to={next ? encodeURIComponent(next) : "#"}
          className={`btn btn-primary${next ? "" : " disabled"}`}
        >
          Next <span aria-hidden="true">&rarr;</span>
        </Link>
        <Link
          to={last ? encodeURIComponent(last) : "#"}
          className={`btn btn-primary${next ? "" : " disabled"}`}
        >
          Last <span aria-hidden="true">&rArr;</span>
        </Link>
      </nav>
    );
  }

  renderLinks = (type, items) => {
    if (Array.isArray(items)) {
      return items.map((item, i) => (
        <div key={i}>{this.renderLinks(type, item)}</div>
      ));
    }

    return (
      <Link to={`../${type}/show/${encodeURIComponent(items)}`}>{items}</Link>
    );
  };
}

const mapStateToProps = (state) => {
  const { retrieved, loading, error, eventSource, deletedItem } =
    state.commerce.list;
  return { retrieved, loading, error, eventSource, deletedItem };
};

const mapDispatchToProps = (dispatch) => ({
  list: (page) => dispatch(list(page)),
  reset: (eventSource) => dispatch(reset(eventSource)),
});

export default connect(mapStateToProps, mapDispatchToProps)(List);
