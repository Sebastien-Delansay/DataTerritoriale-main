import React, { Component } from "react";
import { Field, reduxForm } from "redux-form";
import PropTypes from "prop-types";

class Form extends Component {
  static propTypes = {
    handleSubmit: PropTypes.func.isRequired,
    error: PropTypes.string,
  };

  renderField = (data) => {
    data.input.className = "form-control";

    const isInvalid = data.meta.touched && !!data.meta.error;
    if (isInvalid) {
      data.input.className += " is-invalid";
      data.input["aria-invalid"] = true;
    }

    if (this.props.error && data.meta.touched && !data.meta.error) {
      data.input.className += " is-valid";
    }

    return (
      <div className={`form-group`}>
        <label
          htmlFor={`commerce_${data.input.name}`}
          className="form-control-label"
        >
          {data.input.name}
        </label>
        <input
          {...data.input}
          type={data.type}
          step={data.step}
          required={data.required}
          placeholder={data.placeholder}
          id={`commerce_${data.input.name}`}
        />
        {isInvalid && <div className="invalid-feedback">{data.meta.error}</div>}
      </div>
    );
  };

  render() {
    return (
      <form onSubmit={this.props.handleSubmit}>
        <Field
          component={this.renderField}
          name="nom"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="numero"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="bis"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="voie"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="rue"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="complement"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="postale"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="ville"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="latitude"
          type="number"
          step="0.1"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="longitude"
          type="number"
          step="0.1"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="email"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="telephone"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="fax"
          type="number"
          placeholder=""
          normalize={(v) => parseFloat(v)}
        />
        <Field
          component={this.renderField}
          name="typologie"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="pmr"
          type="checkbox"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="lundi"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="mardi"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="mercredi"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="jeudi"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="vendredi"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="samedi"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="dimanche"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="information"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="comptabilite"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="gerant"
          type="text"
          placeholder=""
        />
        <Field
          component={this.renderField}
          name="proprietaire"
          type="text"
          placeholder=""
        />

        <button type="submit" className="btn btn-success">
          Submit
        </button>
      </form>
    );
  }
}

export default reduxForm({
  form: "commerce",
  enableReinitialize: true,
  keepDirtyOnReinitialize: true,
})(Form);
