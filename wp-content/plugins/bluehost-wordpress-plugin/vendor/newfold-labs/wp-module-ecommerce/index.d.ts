/// <reference path="./node_modules/@wordpress/element/build-types/react.d.ts" />

type FeedEntry = {
  title: string;
  description: React.ReactNode | string[];
  variant: "info" | "success" | "error" | "warning";
  autoDismiss: number;
  onDismiss?: (id: string) => void;
  position: "bottom-left" | "bottom-center" | "top-center";
};

type PluginState = {
  wp: { comingSoon: boolean };
  params: URLSearchParams;
  location: string;
};

type PluginModules = {
  navigate: (location: string) => void;
  notify: { push: (id: string, message: FeedEntry) => void };
};

type PluginActions = {
  toggleComingSoon: () => Promise<void>;
};

type NewfoldECommerceProps = {
  state: PluginState;
  wpModules: PluginModules;
  actions: PluginActions;
};

export type NewfoldECommerce = (props: NewfoldECommerceProps) => JSX.Element;
